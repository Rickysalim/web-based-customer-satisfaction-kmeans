<?php

namespace App\Helpers\Math;

interface Distance
{
    /**
     * @param array $a
     * @param array $b
     */

    public function distance(array $a, array $b): float;
}
