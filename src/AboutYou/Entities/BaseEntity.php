<?php

namespace AboutYou\Entities;


abstract class BaseEntity
{
    /**
     * @param string $key
     * @param mixed $value
     * @return boolean
     */
    public function __set($key, $value) {
        if(method_exists(get_called_class(), 'set' . $key)){
            $this->{'set' . $key}($value);
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key) {
        return method_exists(get_called_class(), 'get' . $key) ?
            $this->{'get' . $key}() : null;
    }
}
