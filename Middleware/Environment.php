<?php

namespace Willypuzzle\Helpers\Middleware;

use Closure;
use Illuminate\Http\Request;
use Willypuzzle\Helpers\Facades\General\Environment as EnvironmentFacade;
use Willypuzzle\Helpers\Contracts\HttpCodes;

class Environment extends AdvancedMiddleware
{

    protected $redirect = null;
    protected $view = null;


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $environment
     * @return mixed
     */
    public function body(Request $request, Closure $next, $environment = null)
    {
        if($environment === null){
            $environment = [true, false, false];
        }else{
            $environment = $this->parseEnvironment($environment);
        }

        if(!EnvironmentFacade::is(...$environment)){
            if($request->ajax()){
                return response()->json(['error' => 'Environment doesn\'t allow this action'], HttpCodes::FORBIDDEN);
            }else{
                if($this->view){
                    return view($this->view);
                }else if ($this->redirect){
                    return redirect($this->redirect);
                }else{
                    return response()->make('Environment doesn\'t allow this action', HttpCodes::FORBIDDEN);
                }
            }
        }


        return $next($request);
    }

    private function parseEnvironment($environment)
    {
        $environment = explode(',', $environment);

        $result = [
            false,
            false,
            false
        ];

        foreach ($environment as $env){
            switch ($env){
                case 'develop':
                    $result[0] = true;
                    break;
                case 'testing':
                    $result[1] = true;
                    break;
                case 'production':
                    $result[2] = true;
                    break;
            }
        }

        return $result;
    }
}