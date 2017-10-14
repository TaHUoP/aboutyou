<?php

namespace AboutYou\Factories;

interface BaseFactory
{
    /**
     * @param string $type
     *
     * @return object
     */
    public function make($type);
}