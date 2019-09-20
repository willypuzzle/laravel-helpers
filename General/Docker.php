<?php


namespace Willypuzzle\Helpers\General;

use Closure;

class Docker
{
    /**
     * @param string $name
     * @param $default
     * @return string|mixed
     */
    static private function secretStatic(string $name, $default)
    {
        $file = '/run/secrets/' . $name;
        if(!file_exists($file)){
            return $default;
        }

        return trim(file_get_contents($file));
    }

    /**
     * @param string $name
     * @param null $default
     * @return Closure
     */
    static function secret(string $name, $default = null): Closure
    {
        return function () use ($name, $default) {
            return self::secretStatic($name, $default);
        };
    }
}
