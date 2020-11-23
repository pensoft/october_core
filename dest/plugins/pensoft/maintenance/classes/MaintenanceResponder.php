<?php

declare(strict_types=1);

namespace Pensoft\Maintenance\Classes;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Pensoft\Maintenance\Contracts\ResponseMaker;

final class MaintenanceResponder implements ResponseMaker
{
    public const HTTP_STATUS_CODE = 503;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var ViewFactory
     */
    private $view;

    /**
     * @var Repository
     */
    private $config;

    public function __construct(
        Request $request,
        ResponseFactory $responseFactory,
        Translator $translator,
        ViewFactory $view,
        Repository $config
    ) {
        $this->request = $request;
        $this->responseFactory = $responseFactory;
        $this->translator = $translator;
        $this->view = $view;
        $this->config = $config;
    }

    public function isCurrentAppUrl($mode)
    {
        if (env('APP_URL') == $mode['app_url']) {
            return true;
        }
    }

    public function isAssocArray($arr)
    {
        if (gettype($arr) !== 'array') {
            return false;
        }
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    public function isDownForMaintenance()
    {
        return file_exists(public_path('sites') . '/down');
    }

    public function getResponse(): Response
    {

        // var_dump($this->layout);die;
        // if ($this->request->ajax()) {
        //     if ($this->request->hasHeader('X-OCTOBER-REQUEST-HANDLER')) {
        //         return $this->responseFactory->make(
        //             $this->translator->trans('vdlp.maintenance::lang.responses.ajax.message'),
        //             self::HTTP_STATUS_CODE
        //         );
        //     }

        //     return $this->responseFactory->json([
        //         'error' => $this->translator->trans('vdlp.maintenance::lang.responses.ajax.message'),
        //     ], self::HTTP_STATUS_CODE);
        // }
        // var_dump(get_class_methods($this->view->make()));die;
        // $this->view->bootDefaultTheme();
        $view = $this->view->file($this->getMaintenancePagePath(), [
            'locale' => $this->translator->getLocale(),
            'app_name' => $this->config->get('app.name'),
            'css' => themes_path('pensoft/assets/less/theme.less')
        ]);

        return $this->responseFactory->make($view, self::HTTP_STATUS_CODE);
    }

    private function getMaintenancePagePath(): string
    {
        // return 'cms::404';
        if (file_exists($page = themes_path('pensoft/pages/503.htm'))) {
            return $page;
        }

        return __DIR__ . '/../assets/503.htm';
    }
}
