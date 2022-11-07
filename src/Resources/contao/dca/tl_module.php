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
 * Frontend modules
 */
$GLOBALS['TL_DCA']['tl_module']['palettes'][ListenChartjsModulesController::TYPE] = '{title_legend},name,headline,type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';
