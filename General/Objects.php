<?php


namespace Willypuzzle\Helpers\General;


class Objects
{
    public static function toArray($obj)
    {
        return json_decode(json_encode($obj), true);
    }
}
