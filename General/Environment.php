<?php

namespace Willypuzzle\Helpers\General;

class Environment {
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function isProduction()
    {
        return !$this->app->environment('local') &&
               !$this->app->environment('staging') &&
               !$this->app->environment('dev') &&
               !$this->app->environment('testing') &&
               !$this->app->environment('develop') &&
               !$this->app->environment('test') &&
               !$this->app->environment('developing');
    }

    public function isTesting()
    {
        return $this->app->environment('testing') || $this->app->environment('staging') || $this->app->environment('test');
    }

    public function isDevelop()
    {
        return $this->app->environment('dev') || $this->app->environment('develop') || $this->app->environment('developing');
    }

    /**
     * It checks if the enviroment is one of them
     *
     * @param bool $develop set true if you want to check for develop enviroment
     * @param bool $testing set true if you want to check for testing enviroment
     * @param bool $production set true if you want to check for production enviroment
     * @return bool
     * @throws \Willypuzzle\Helpers\Exceptions\WtfTypeException
     */
    public function is($develop = true, $testing = false, $production = false)
    {
        /*0-0-0*/
        if (!$develop && !$testing && !$production)
        {
            throw new \Willypuzzle\Helpers\Exceptions\WtfTypeException("What the hell are you asking to me? Can an environment not to be nothing?");
        }

        /*0-0-1*/
        if(!$develop && !$testing && $production)
        {
            return $this->isProduction();
        }

        /*0-1-0*/
        if(!$develop && $testing && !$production)
        {
            return $this->isTesting();
        }

        /*0-1-1*/
        if(!$develop && $testing && $production)
        {
            return $this->isTesting() || $this->isProduction();
        }

        /*1-0-0*/
        if($develop && !$testing && !$production)
        {
            return $this->isDevelop();
        }

        /*1-0-1*/
        if($develop && !$testing && $production)
        {
            return $this->isProduction() || $this->isDevelop();
        }

        /*1-1-0*/
        if($develop && $testing && !$production)
        {
            return $this->isDevelop() || $this->isTesting();
        }

        /*1-1-1*/
        if($develop && $testing && $production)
        {
            return $this->isProduction() || $this->isTesting() || $this->isProduction();
        }
    }
}