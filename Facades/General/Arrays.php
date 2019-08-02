<?php
namespace Willypuzzle\Helpers\Facades\General;

use Illuminate\Support\Facades\Facade;
/**
 * @method static boolean arrayEqual(array $a, array $b)
 * @method static boolean isSubset(array $container, array $contained)
 * @method static object toObj(array $array)
 * @method static array pick(array $array, $fields = [])
 * @method static mixed get($array, $path, $default = null)
 * @method static array set($array, $path, $value)
 * @method static boolean isAssociative($arr)
 */
class Arrays extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'willypuzzle.helpers.general.arrays'; }
}
