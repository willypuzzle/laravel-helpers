<?php

namespace Willypuzzle\Helpers\General;

use function _\pick;
use function _\property;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\Exception\UnexpectedTypeException;

class Arrays {
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * This method return true if the arrays have the same values indipentently of their order
     *
     * for example:
     *
     * [0, 1] and [1, 0] return  true
     *
     * @param array $a
     * @param array $b
     * @return bool
     */
    public function arrayEqual(array $a, array $b)
    {
        return (count($a) == count($b) && array_diff($a, $b) === array_diff($b, $a));
    }

    /**
     * Check if $contained is a subset of $container
     *
     * @param array $container
     * @param array $contained
     *
     * @return bool
     */
    public function isSubset(array $container, array $contained)
    {
        return count($container) >= count($contained) && count(array_intersect($container, $contained)) == count($contained);
    }

    public static function toObj(array $array)
    {
        return (object)$array;
    }

    public static function pick(array $array, $fields = [])
    {
        try{
            $data = self::toObj($array);
            $data = pick($data, $fields);
            return Objects::toArray($data);
        }catch (NoSuchPropertyException $ex) {
            return null;
        }
    }

    public static function get($array, $path, $default = null)
    {
        if(!$array){
            return $default;
        }

        if(count(explode('.', $path)) == 1){
            return $array[$path] ?? $default;
        }

        $fn = property($path);

        try {
            return $fn($array);
        }catch (UnexpectedTypeException $ex) {
            return $default;
        }
    }

    public static function set($array, $path, $value)
    {
        $path = explode('.', $path);

        $array = $array ?? [];

        foreach ($path as $key => $valuex){
            $variableHold = 'variable-'.$key;
            $variableKeep = 'variable-'.($key-1);
            if($key == 0){
                $$variableHold = $array[$valuex] ?? [];
            }else{
                $hold = $$variableKeep;
                $$variableHold = $hold[$valuex] ?? [];
            }
        }

        $pathInverse = collect($path)->reverse()->values();
        $count = count($pathInverse) - 1;
        foreach ($pathInverse as $key => $valuex){
            $keyx = $count - $key;
            $variableHold = 'variable-'.($keyx);
            $variableKeep = 'variable-'.($keyx - 1);
            if($keyx == $count){
                $$variableKeep[$valuex] = $value;
            }else if($keyx == 0){
                $array[$valuex] = $$variableHold;
            }else{
                $$variableKeep[$valuex] = $$variableHold ?? [];
                $$variableHold = $$variableKeep[$valuex];
            }
        }

        return $array;
    }

    public static function isAssociative($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
