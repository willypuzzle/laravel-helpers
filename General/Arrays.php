<?php

namespace Willypuzzle\Helpers\General;

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
    public function arrayEqual($a, $b) {
        return (
            is_array($a)
            && is_array($b)
            && count($a) == count($b)
            && array_diff($a, $b) === array_diff($b, $a)
        );
    }
}