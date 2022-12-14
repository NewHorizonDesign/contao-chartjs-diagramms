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

namespace Newhorizondesign\ContaoChartjsDiagramms;

use Newhorizondesign\ContaoChartjsDiagramms\DependencyInjection\NewhorizondesignContaoChartjsDiagrammsExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NewhorizondesignContaoChartjsDiagramms extends Bundle
{
	public function getContainerExtension(): NewhorizondesignContaoChartjsDiagrammsExtension
	{
		return new NewhorizondesignContaoChartjsDiagrammsExtension();
	}

	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
	}
}
