<?php

namespace Willypuzzle\Helpers\Middleware;

use Closure;
use Illuminate\Http\Request;


abstract class AdvancedMiddleware
{
    protected $except = [];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $environment
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $parameter = null)
    {
        foreach ($this->except as $ex){
            if($request->route()->getName() == $ex){
                return $next($request);
            }
        }

        return $this->body($request, $next, $parameter);
    }

    abstract public function body(Request $request, Closure $next, $parameter = null);
}