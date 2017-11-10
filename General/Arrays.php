<?php

namespace Willypuzzle\Helpers\General;

class Arrays {
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param array $a
     * @param array $b
     * @return bool
     */
    public function arrayEqual($a, $b) {
        return (
            is_array($a)
            && is_array($b)
            && count($a) == count($b)
            && array_diff($a, $b) === array_diff($b, $a)
        );
    }
}