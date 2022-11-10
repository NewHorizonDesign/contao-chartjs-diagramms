<?php

declare(strict_types=1);

/*
 * This file is part of Contao ChartJS Diagramms.
 *
 * (c) NewHorizonDesign 2022 <service@newhorizon-design.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/newhorizondesign/contao-chartjs-diagramms
 */

use Contao\Backend;
use Contao\DataContainer;
use Contao\DC_Table;
use Contao\Input;

/**
 * Table tl_nhd_chartjs
 */
$GLOBALS['TL_DCA']['tl_nhd_chartjs'] = array(

    // Config
    'config'      => array(
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'sql'              => array(
            'keys' => array(
                'id' => 'primary'
            )
        ),
    ),
    'list'        => array(
        'sorting'           => array(
            'mode'        => 2,
            'fields'      => array('title'),
            'flag'        => 1,
            'panelLayout' => 'filter;sort,search,limit'
        ),
        'label'             => array(
            'fields' => array('title'),
            'format' => '%s',
        ),
        'global_operations' => array(
            'all' => array(
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations'        => array(
            'edit'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_nhd_chartjs']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.svg'
            ),
            'copy'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_nhd_chartjs']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.svg'
            ),
            'delete' => array(
                'label'      => &$GLOBALS['TL_LANG']['tl_nhd_chartjs']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null) . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show'   => array(
                'label'      => &$GLOBALS['TL_LANG']['tl_nhd_chartjs']['show'],
                'href'       => 'act=show',
                'icon'       => 'show.svg',
                'attributes' => 'style="margin-right:3px"'
            ),
        )
    ),
    // Palettes
    'palettes'    => array(
        '__selector__' => array('addSubpalette'),
        'default'      => '{first_legend},title,chartType,size,cssID,cssClass;{second_legend},activeAnimation,responsiveWidth,singleSRC,jsonInput,jsonInputLabels,jsonInputOptions;'
    ),
    // Subpalettes
    'subpalettes' => array(
        'addSubpalette' => '',
    ),
    // Fields
    'fields'      => array(
        'id'             => array(
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp'         => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'title'          => array(
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'flag'      => 1,
            'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'long clr'),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'chartType'    => array(
            'inputType' => 'select',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'options'   => &$GLOBALS['TL_LANG']['tl_nhd_chartjs']['chartTypes']['options'],
            //'foreignKey'            => 'tl_user.name',
            //'options_callback'      => array('CLASS', 'METHOD'),
            'eval'      => array('submitOnChange' => true, 'includeBlankOption' => true, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''",
            //'relation'  => array('type' => 'hasOne', 'load' => 'lazy'),
        ),
        'size' => array(
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'eval'      => array('multiple' => true, 'size' => 2, 'decodeEntities' => true, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'cssID'  => array(
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'eval'      => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'cssClass'  => array(
            'inputType' => 'text',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'eval'      => array('mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'singleSRC' => [
            'exclude'   => true,
            'inputType' => 'fileTree',
            'eval'      => [
                'filesOnly'  => true,
                'fieldType'  => 'radio',
                'extensions' => 'json',
            ],
            'sql'       => "binary(16) NULL"
        ],
        'activeAnimation' => [
            'inputType' => 'checkbox',
            'sql' => [
                'type' => 'boolean',
                'default' => false,
            ],
        ],
        'responsiveWidth' => [
            'inputType' => 'checkbox',
            'sql' => [
                'type' => 'boolean',
                'default' => false,
            ],
        ],
        'jsonInput'  => array(
            'inputType' => 'textarea',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'eval'      => array('mandatory' => false, 'tl_class' => 'w50'),
            'sql'       => "text NOT NULL default ''",
            'load_callback' => array(
                array('tl_nhd_chartjs', 'jsonInputCallback')
            )
        ),
        'jsonInputLabels'  => array(
            'inputType' => 'textarea',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'eval'      => array('mandatory' => false, 'tl_class' => 'w50'),
            'sql'       => "text NOT NULL default ''",
            'load_callback' => array(
                array('tl_nhd_chartjs', 'jsonInputLabelsCallback')
            )
        ),
        'jsonInputOptions'  => array(
            'inputType' => 'textarea',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            'eval'      => array('mandatory' => false, 'tl_class' => 'w50'),
            'sql'       => "text NOT NULL default ''",
            'load_callback' => array(
                array('tl_nhd_chartjs', 'jsonInputOptionsCallback')
            )
        ),
    )
);

class tl_nhd_chartjs extends Backend
{

    public function jsonInputOptionsCallback($varValue, DataContainer $dc)
    {
        if(!empty($varValue)) {
            return $varValue;
        } else {
            return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInputOptions']['default']);
        }
    }

    public function jsonInputLabelsCallback($varValue, DataContainer $dc)
    {
        if(!empty($varValue)) {
            return $varValue;
        } else {
            return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInputLabels']['default']);
        }
    }

    public function jsonInputCallback($varValue, DataContainer $dc)
    {
        if(!empty($varValue)) {
            return $varValue;
        } else {
            switch($dc->activeRecord->chartType) {
                case 'bar':
                    return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['var']);
                    break;
                case 'bubble':
                    return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['bubble']);
                    break;
                case 'line':
                    return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['line']);
                    break;
                case 'scatter':
                    return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['scatter']);
                    break;
                case 'pie':
                    return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['pie']);
                    break;
                case 'doughnut':
                    return json_decode($GLOBALS['TL_LANG']['tl_nhd_chartjs']['fields']['jsonInput']['default']['doughnut']);
                    break;
                default:
                    return " ";
                    break;
            }
        }
    }
}
