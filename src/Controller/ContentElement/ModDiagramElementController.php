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

namespace Newhorizondesign\ContaoChartjsDiagramms\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\StringUtil;
use Contao\Template;
use Newhorizondesign\ContaoChartjsDiagramms\Model\NhdChartjsModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

#[AsContentElement(category: 'diagram_element')]
class ModDiagramElementController extends AbstractContentElementController
{
    public const TYPE = 'mod_diagram_element';

    private TwigEnvironment $twig;

    public function __construct(TwigEnvironment $twig)
    {
        $this->twig = $twig;
    }
    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $chartID = $template->configSelect;
        $chartNumber = $template->configSelect.$template->tstamp;

        ${'chartModel'.$chartNumber} = NhdChartjsModel::findByID($chartID);

        $size = StringUtil::deserialize(${'chartModel'.$chartNumber}->size);
        $canvasWidth = $size[0];
        $canvasHeight = $size[1];

        return new Response($this->twig->render(
            '@NewhorizondesignContaoChartjsDiagramms/diagramms/dynamicChart.twig',
            [
                'chartID'           => $chartNumber,
                'title'             => ${'chartModel'.$chartNumber}->title,
                'cssID'             => ${'chartModel'.$chartNumber}->cssID."-".$chartNumber,
                'cssClass'          => ${'chartModel'.$chartNumber}->cssClass,
                'chartWidth'        => $canvasWidth,
                'chartHeight'       => $canvasHeight,
                'chartType'         => ${'chartModel'.$chartNumber}->chartType,
                'chartData'         => StringUtil::decodeEntities(${'chartModel'.$chartNumber}->jsonInput),
                'chartLabel'        => StringUtil::decodeEntities(${'chartModel'.$chartNumber}->jsonInputLabels),
                'chartOptions'      => StringUtil::decodeEntities(${'chartModel'.$chartNumber}->jsonInputOptions),
                'chartAnimation'    => (${'chartModel'.$chartNumber}->activeAnimation) ? true: false,
                'responsiveWidth'   => (${'chartModel'.$chartNumber}->responsiveWidth) ? true: false,
            ]
        ));
    }
}
