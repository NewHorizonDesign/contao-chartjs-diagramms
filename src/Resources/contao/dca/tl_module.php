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

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\Database;
use Newhorizondesign\ContaoChartjsDiagramms\Controller\FrontendModule\ListenChartjsModulesController;

/**
 * Frontend modules
 */
$GLOBALS['TL_DCA']['tl_module']['palettes'][ListenChartjsModulesController::TYPE] = '{title_legend},name,headline,configSelect,type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';

/**
 * Palette Manipulator
 */
PaletteManipulator::create()
    ->addLegend('configSelect', 'title_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_module')
;

/**
 * Add additional Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['configSelect'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['configSelect'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'select',
    'foreignKey'              => 'tl_nhd_chartjs.title',
    'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true, 'includeBlankOption'=>true, 'tl_class'=>'long clr'),
    'sql'                     => "int(10) unsigned NOT NULL default '0'",
    'relation'                => array('type'=>'hasOne', 'load'=>'lazy'),
    'options_callback'        => function() {
        $options = array();

        $tariffsConfigurations = Database::getInstance()->prepare('SELECT id,title FROM tl_nhd_chartjs')
            ->execute('title');

        while ($tariffsConfigurations->next()) {
            $options[$tariffsConfigurations->id] = $tariffsConfigurations->title;
        }

        return $options;
    }
];
