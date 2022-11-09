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

namespace Newhorizondesign\ContaoChartjsDiagramms\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\Date;
use Contao\FrontendUser;
use Contao\ModuleModel;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\Template;
use Doctrine\DBAL\Connection;
use Newhorizondesign\ContaoChartjsDiagramms\Model\NhdChartjsModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Security;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment as TwigEnvironment;



#[AsFrontendModule(category: 'ChartJS')]
class ListenChartjsModulesController extends AbstractFrontendModuleController
{
    public const TYPE = 'listen_chartjs_modules';

    private TwigEnvironment $twig;

    public function __construct(TwigEnvironment $twig)
    {
        $this->twig = $twig;
    }

   /**
     * This method extends the parent __invoke method,
     * its usage is usually not necessary
     */
    public function __invoke(Request $request, ModuleModel $model, string $section, array $classes = null, PageModel $page = null): Response
    {
        // Get the page model
        $this->page = $page;

        if ($this->page instanceof PageModel && $this->get('contao.routing.scope_matcher')->isFrontendRequest($request)) {
            // If TL_MODE === 'FE'
            $this->page->loadDetails();
        }

        return parent::__invoke($request, $model, $section, $classes);
    }

    /**
     * Lazyload services
     */
    public static function getSubscribedServices(): array
    {
        $services = parent::getSubscribedServices();

        $services['contao.framework'] = ContaoFramework::class;
        $services['database_connection'] = Connection::class;
        $services['contao.routing.scope_matcher'] = ScopeMatcher::class;
        $services['security.helper'] = Security::class;
        $services['translator'] = TranslatorInterface::class;

        return $services;
    }

    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        $chartModel = NhdChartjsModel::findByID($template->configSelect);
        $size = StringUtil::deserialize($chartModel->size);
        $canvasWidth = $size[0];
        $canvasHeight = $size[1];

        return new Response($this->twig->render(
            '@NewhorizondesignContaoChartjsDiagramms/diagramms/dynamicChart.twig',
            [
                'cssID'             => $chartModel->cssID,
                'cssClass'          => $chartModel->cssClass,
                'chartWith'         => $canvasWidth,
                'chartHeight'       => $canvasHeight,
                'chartType'         => $chartModel->chartType,
                'chartData'         => StringUtil::decodeEntities($chartModel->jsonInput),
                'chartLabel'        => StringUtil::decodeEntities($chartModel->jsonInputLabels),
                'chartOptions'      => StringUtil::decodeEntities($chartModel->jsonInputOptions),
                'chartID'           => $chartModel->id,
                'activeAnimation'   => ($chartModel->activeAnimation) ? 'true': 'false',
                'responsiveWidth'   => ($chartModel->responsiveWidth) ? 'true': 'false'
            ]
        ));
    }
}
