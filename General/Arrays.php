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
}