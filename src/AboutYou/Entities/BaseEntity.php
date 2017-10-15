<?php

namespace AboutYou\Entities;


abstract class BaseEntity
{
    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value) {
        $this->{'set' . $key}($value);
    }

    /**
     * @param string $key
     */
    public function __get($key) {
        return $this->{'get' . $key};
    }
}
