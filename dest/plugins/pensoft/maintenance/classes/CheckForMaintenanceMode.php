<?php

namespace Pensoft\Maintenance\classes;

use Closure;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Pensoft\Maintenance\exceptions\MaintenanceModeException;
// use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

class CheckForMaintenanceMode
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct()
    {
        // var_dump($a);die;
        // $this->app = $app;
    }

    public function isDownForMaintenance()
    {
        return file_exists(public_path('sites') . '/down');
    }

    public function isCurrentAppUrl($mode){
        if(env('APP_URL') == $mode['app_url']){
            return true;
        }
    }

    public function isAssocArray($arr){
        if (gettype($arr) !== 'array') {
            return false;
        }
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
        // var_dump($request);die;
        if ($this->isDownForMaintenance()) {
            $data = json_decode(file_get_contents(public_path('sites') . '/down'), true);

            if(gettype($data) !== 'array'){
                return $next($request);
            }

            if($this->isAssocArray($data)){
                throw new MaintenanceModeException($data['time'], $data['retry'], $data['message']);
            }
            
            foreach($data as $mode){
                $headers = [];
                if ($mode['retry']) {
                    $headers = ['Retry-After' => $mode['retry']];
                }
                if($this->isCurrentAppUrl($mode)){
                    throw new MaintenanceModeException($mode['time'], $mode['retry'], $mode['message']);
                }
            }
        }

        return $next($request);
    }
}
