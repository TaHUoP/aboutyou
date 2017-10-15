<?php

namespace AboutYou\Contracts\Validators;


interface Validatable
{
    /**
     * @return array
     */
    public static function getValidationRules();
}