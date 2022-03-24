<?php
namespace Willypuzzle\Helpers\Facades\General;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool isProduction()
 * @method static bool isTesting()
 * @method static bool isDevelop()
 * @method static bool is(bool $develop = true, bool $testing = false, bool $production = false)
 */
class Environment extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'willypuzzle.helpers.general.environment'; }
}