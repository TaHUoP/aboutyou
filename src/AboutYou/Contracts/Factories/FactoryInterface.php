<?php

namespace AboutYou\Factories;

interface FactoryInterface
{
    /**
     * @param string $type
     *
     * @return object
     *
     * @throws \InvalidArgumentException
     */
    public function make($type);
}