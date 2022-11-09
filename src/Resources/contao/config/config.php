<?php

/*
 * This file is part of Contao ChartJS Diagramms.
 *
 * (c) NewHorizonDesign 2022 <service@newhorizon-design.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/newhorizondesign/contao-chartjs-diagramms
 */

use Newhorizondesign\ContaoChartjsDiagramms\Model\NhdChartjsModel;

/**
 * Backend modules
 */
$GLOBALS['BE_MOD']['chartjs']['chartjs_collection'] = array(
    'tables' => array('tl_nhd_chartjs')
);

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_nhd_chartjs'] = NhdChartjsModel::class;


/**
 * CSS / JAVASCRIPT
 */
$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/newhorizondesigncontaochartjsdiagramms/js/chart.js|static|'.time();
