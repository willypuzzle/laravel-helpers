<?php
namespace Willypuzzle\Helpers\Facades\General;

use Illuminate\Support\Facades\Facade;
/**
 * @method boolean arrayEqual(array $a, array $b)
 * @method boolean isSubset(array $container, array $contained)
 * @method object toObj(array $array)
 * @method array pick(array $array, $fields = [])
 * @method mixed get($array, $path, $default = null)
 * @method array set($array, $path, $value)
 * @method boolean isAssociative($arr)
 */
class Arrays extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'willypuzzle.helpers.general.arrays'; }
}