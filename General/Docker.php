<?php


namespace Willypuzzle\Helpers\General;

use Closure;

class Docker
{
    static private $isDocker = null;
    static private $decodedFileContent = false;
    /**
     * @param string $field
     * @param $default
     * @param $secretFilename
     * @return mixed|null
     */
    static private function secretStatic(string $field, $default, $secretFilename)
    {
        if(self::$isDocker === false){
            return $default;
        }

        $file = '/run/secrets/' . $secretFilename;
        if(self::$isDocker === null){
            if(!file_exists($file)){
                self::$isDocker = false;
                return $default;
            }else{
                self::$isDocker = true;
            }
        }

        if(self::$decodedFileContent === false){
            self::$decodedFileContent = json_decode(trim(file_get_contents($file)), true);
        }

        if(!self::$decodedFileContent){
            return $default;
        }

        return Arrays::get(self::$decodedFileContent, $field, $default);
    }

    /**
     * @param string $field
     * @param null $default
     * @param string $secretFileName
     * @return Closure
     */
    static public function secret(string $field, $default = null, string $secretFileName = 'laravel-secret'): Closure
    {
        return function () use ($field, $default, $secretFileName) {
            return self::secretStatic($field, $default, $secretFileName);
        };
    }
}
