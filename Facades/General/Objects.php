<?php
namespace Willypuzzle\Helpers\Facades\General;

use Illuminate\Support\Facades\Facade;

class Objects extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'willypuzzle.helpers.general.objects'; }
}
