<?php

namespace AboutYou\Utilities\Helpers;

function is_scalar($item)
{
    return \is_scalar($item) || is_null($item);
}

function is_collection($array)
{
    /*
     * I find more logical to put multiple entities to an array, so this entire method can be replaced with is_array function.
     * But I was allowed to change app architecture, not data source structure.
     */
    if(!is_array($array))
        $array = (array)$array;

    return count($array) === count(array_filter(array_keys($array), 'is_numeric'));
}
