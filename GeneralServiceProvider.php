<?php

namespace Willypuzzle\Helpers;

use Illuminate\Support\ServiceProvider;
use Willypuzzle\Helpers\General\Database;
use Willypuzzle\Helpers\General\Environment;
use Willypuzzle\Helpers\General\Arrays;
use Willypuzzle\Helpers\General\Objects;
use Willypuzzle\Helpers\General\Traits;
use Willypuzzle\Helpers\Validation\Json;


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
        $this->registerArrays();
        $this->registerObjects();
        $this->registerValidationJson();
        $this->registerTraits();
    }

    /**
     * Register the database services.
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
     * Register the environment services.
     *
     * @return void
     */
    protected function registerEnvironment()
    {
        $this->app->singleton('willypuzzle.helpers.general.environment', function ($app) {
            return new Environment($app);
        });
    }

    /**
     * Register the arrays services.
     *
     * @return void
     */
    protected function registerArrays()
    {
        $this->app->singleton('willypuzzle.helpers.general.arrays', function ($app) {
            return new Arrays($app);
        });
    }

    /**
     * Register the objects services.
     *
     * @return void
     */
    protected function registerObjects()
    {
        $this->app->singleton('willypuzzle.helpers.general.objects', function ($app) {
            return new Objects($app);
        });
    }

    /**
     * Register the arrays services.
     *
     * @return void
     */
    protected function registerTraits()
    {
        $this->app->singleton('willypuzzle.helpers.general.traits', function ($app) {
            return new Traits($app);
        });
    }

    /**
     * Register the arrays services.
     *
     * @return void
     */
    protected function registerValidationJson()
    {
        $this->app->singleton('willypuzzle.helpers.validation.json', function ($app) {
            return new Json($app);
        });
    }
}
