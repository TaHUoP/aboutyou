<?php

namespace AboutYou\Factories;


use AboutYou\Contracts\Validators\Validatable;
use AboutYou\Validators\Validator;

abstract class BaseFactory implements FactoryInterface
{
    /**
     * @return string
     */
    abstract protected function getNamespace();

    /**
     * @inheritdoc
     * @throws \AboutYou\Exceptions\ValidationException
     */
    public function make($className, $constructorArgs = [], $defaultData = [])
    {
        $fullClassName = $this->getNamespace() . "$className";

        if(class_exists($fullClassName)){
            $object = new $fullClassName(...$constructorArgs);
        } else {
            throw new \InvalidArgumentException("Class $fullClassName doesn't exists");
        }

        if($object instanceof Validatable)
            Validator::validate($defaultData, $object::getValidationRules());

        foreach($defaultData as $prop => $value){
            if(\AboutYou\Utilities\Helpers\is_scalar($value)){
                $object->{$prop} = $value;
            }
        }

        return $object;
    }
}