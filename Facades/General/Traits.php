<?php
namespace Willypuzzle\Helpers\Facades\General;

use Illuminate\Support\Facades\Facade;

class Traits extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'willypuzzle.helpers.general.traits'; }
}