<?php

namespace Willypuzzle\Helpers;

use Illuminate\Support\ServiceProvider;
use Willypuzzle\Helpers\General\Database;
use Willypuzzle\Helpers\General\Environment;


class GeneralServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDatabase();
        $this->registerEnvironment();
    }

    /**
     * Register the authenticator services.
     *
     * @return void
     */
    protected function registerDatabase()
    {
        $this->app->singleton('willypuzzle.helpers.general.database', function ($app) {
            return new Database($app);
        });
    }

    /**
     * Register the authenticator services.
     *
     * @return void
     */
    protected function registerEnvorinment()
    {
        $this->app->singleton('willypuzzle.helpers.general.environment', function ($app) {
            return new Environment($app);
        });
    }
}
