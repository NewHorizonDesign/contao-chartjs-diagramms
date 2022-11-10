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

use Newhorizondesign\ContaoChartjsDiagramms\Controller\FrontendModule\ListenChartjsModulesController;

/**
 * Backend modules
 */
$GLOBALS['TL_LANG']['MOD']['chartjs_collection'] = ['Diagramme', 'Fügt ein beliebiges Chart Diagramm ein.'];

/**
 * Frontend modules
 */
$GLOBALS['TL_LANG']['FMD'][ListenChartjsModulesController::TYPE] = ['ChartJS Diagramme', 'Fügt ein beliebiges Chart Diagramm ein.'];
$GLOBALS['TL_DCA']['tl_module']['fields']['configSelect'] = ["Diagrammauswahl","Wähle hier dein Diagramm aus, welches du anzeigen lassen willst."];
