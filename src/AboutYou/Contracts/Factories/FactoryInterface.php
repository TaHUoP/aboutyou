<?php

namespace AboutYou\Factories;

interface FactoryInterface
{
    /**
     * @param string $type
     *
     * @return object
     */
    public function make($type);
}