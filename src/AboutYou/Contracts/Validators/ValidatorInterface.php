<?php

namespace AboutYou\Contracts\Validators;


interface ValidatorInterface
{
    /**
     * @param array $data
     * @param array $rules
     * @return boolean
     * @throws \AboutYou\Exceptions\ValidationException
     */
    public static function validate($data, $rules);
}