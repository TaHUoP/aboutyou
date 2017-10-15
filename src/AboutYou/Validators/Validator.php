<?php

namespace AboutYou\Validators;


use AboutYou\Contracts\Validators\ValidatorInterface;
use AboutYou\Exceptions\ValidationException;

/*
 * Available rules: positive, required and those that have function matching pattern is_{rule}
 */
class Validator implements ValidatorInterface
{
    /**
     * @var array
     */
    private static $data = [];

    /**
     * @var array
     */
    private static $errors = [];

    /**
     * @var string
     */
    private static $defaultMessage = 'Field %s breaks %s rule';

    /**
     * @var array
     */
    private static $messages = [
        'bool' => 'Field %s must be boolean',
        'array' => 'Field %s must be an array',
        'numeric' => 'Field %s must be numeric',
        'positive' => 'Field %s must be positive',
        'required' => 'Field %s is required',
    ];

    private function __construct(){}

    /**
     * @param string $rulesRaw
     * @return array
     * @throws \AboutYou\Exceptions\ValidationException
     */
    private static function parseRules($rulesRaw)
    {
        $rules = explode('|', $rulesRaw);

        foreach ($rules as $rule){
            if(!function_exists('is_' . $rule) && !method_exists(get_called_class(), $rule))
                throw new ValidationException(sprintf("Rule %s doesn't exist", $rule));
        }

        return $rules;
    }

    /**
     * @param string $field
     * @param string $rule
     */
    private static function applyRule($field, $rule)
    {
        if(method_exists(get_called_class(), $rule)){
            $rulePassed = self::$rule($field);
        }else{
            $function = 'is_' . $rule;
            $rulePassed = $function(self::$data[$field]);
        }

        if(!$rulePassed)
            self::$errors[$field] []= $rule;
    }

    /**
     * @throws \AboutYou\Exceptions\ValidationException
     */
    private static function processErrors()
    {
        if(!empty(self::$errors)){
            $messages = [];

            foreach (self::$errors as $field => $errors){
                if(in_array('required', $errors)){
                    $messages []= sprintf(self::$messages['required'], $field);
                    continue;
                }

                foreach ($errors as $error){
                    if(!isset(self::$messages[$error])){
                        $messages []= sprintf(self::$defaultMessage, $field, $error);
                    }else{
                        $messages []= sprintf(self::$messages[$error], $field);
                    }
                }
            }

            throw new ValidationException(implode('; ', $messages));
        }
    }

    /**
     * @param array $data
     * @param array $rules
     * @return bool
     * @throws \AboutYou\Exceptions\ValidationException
     */
    public static function validate($data, $rules)
    {
        if(empty($data))
            throw new ValidationException('No data passed');

        if(empty($rules))
            throw new ValidationException('No rules passed');

        self::$errors = [];
        self::$data = $data;

        foreach ($rules as $field => $fieldRules){
            $fieldRules = self::parseRules($fieldRules);

            foreach ($fieldRules as $rule){
                self::applyRule($field, $rule);
            }
        }

        self::processErrors();

        return empty(self::$errors);
    }

    /**
     * @param string $field
     * @return bool
     */
    private static function required($field)
    {
        return array_key_exists($field, self::$data);
    }

    /**
     * @param string $field
     * @return bool
     */
    private static function positive($field)
    {
        return is_numeric(self::$data[$field]) && self::$data[$field] > 0;
    }
}