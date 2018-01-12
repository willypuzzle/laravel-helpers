<?php

namespace Willypuzzle\Helpers\General;

class Traits {
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function all($class, $autoload = true)
    {
        $traits = [];
        do {
            $traits = array_merge(class_uses($class, $autoload), $traits);
        } while($class = get_parent_class($class));
        foreach ($traits as $trait => $same) {
            $traits = array_merge(class_uses($trait, $autoload), $traits);
        }
        return array_unique($traits);
    }

    public function use($class, $trait, $autoload = true)
    {
        $traits = $this->all($class, $autoload);

        return in_array($trait, $traits);
    }
}