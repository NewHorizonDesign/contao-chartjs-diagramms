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
declare(strict_types=1);

namespace Newhorizondesign\ContaoChartjsDiagramms\Tests\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use Contao\TestCase\ContaoTestCase;
use Newhorizondesign\ContaoChartjsDiagramms\ContaoManager\Plugin;
use Newhorizondesign\ContaoChartjsDiagramms\NewhorizondesignContaoChartjsDiagramms;
/**
 * @package Newhorizondesign\ContaoChartjsDiagramms\Tests\ContaoManager
 */
class PluginTest extends ContaoTestCase
{
    /**
     * Test Contao manager plugin class instantiation
     */
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(Plugin::class, new Plugin());
    }

    /**
     * Test returns the bundles
     */
    public function testGetBundles(): void
    {
        $plugin = new Plugin();

        /** @var array $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        $this->assertCount(1, $bundles);
        $this->assertInstanceOf(BundleConfig::class, $bundles[0]);
        $this->assertSame(NewhorizondesignContaoChartjsDiagramms::class, $bundles[0]->getName());
        $this->assertSame([ContaoCoreBundle::class], $bundles[0]->getLoadAfter());
    }

}
