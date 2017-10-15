<?php

namespace AboutYou\Factories;


abstract class BaseFactory implements FactoryInterface
{
    abstract protected function getNamespace();

    /**
     * @inheritdoc
     */
    public function make($className, $constructorArgs = [], $defaultData = [])
    {
        $fullClassName = $this->getNamespace() . "$className";

        if(class_exists($fullClassName)){
            $object = new $fullClassName(...$constructorArgs);
        } else {
            throw new \InvalidArgumentException("Class $fullClassName doesn't exists");
        }

        foreach($defaultData as $prop => $value){
            if(\AboutYou\Utilities\Helpers\is_scalar($value)){
                $object->{$prop} = $value;
            }
        }

        return $object;
    }
}