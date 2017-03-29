<?php

namespace Willypuzzle\Helpers;

use Illuminate\Support\ServiceProvider;
use Willypuzzle\Helpers\General\Database;


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
}
