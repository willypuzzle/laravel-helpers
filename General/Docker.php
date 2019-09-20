<?php


namespace Willypuzzle\Helpers\General;

use Closure;

class Docker
{
    /**
     * @param string $field
     * @param $default
     * @param $secretFilename
     * @return mixed|null
     */
    static private function secretStatic(string $field, $default, $secretFilename)
    {
        $file = '/run/secrets/' . $secretFilename;
        if(!file_exists($file)){
            return $default;
        }

        $fileContent = json_decode(trim(file_get_contents($file)), true);
        if(!$fileContent){
            return $default;
        }

        return Arrays::get($fileContent, $field, $default);
    }

    /**
     * @param string $field
     * @param null $default
     * @param string $secretFileName
     * @return Closure
     */
    static function secret(string $field, $default = null, string $secretFileName = 'laravel-secret'): Closure
    {
        return function () use ($field, $default, $secretFileName) {
            return self::secretStatic($field, $default, $secretFileName);
        };
    }
}
