<?php


namespace Pensoft\Maintenance\Middlewares;
use Response;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\View;
use Pensoft\Maintenance\exceptions\MaintenanceModeException;

// use Illuminate\Http\Response;
// use October\Rain\Exception\AjaxException;
// use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class TestMiddleware {

    public function handle($request, Closure $next)
    {
        // return abort(503);
        // throw new MaintenanceModeException(1, 1, 1);
        // return Response::make(View::make('pensoft.maintenance::assets/503'), 200);

        return $next($request);
        //youre code
    }
}