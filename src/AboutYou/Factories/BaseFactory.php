<?php

namespace AboutYou\Factories;


abstract class BaseFactory implements FactoryInterface
{
    abstract protected function getNamespace();

    /**
     * @inheritdoc
     */
    public function make($entityName, $constructorArgs = [])
    {
        $fullEntityName = $this->getNamespace() . "$entityName";

        if(class_exists($fullEntityName)){
            return new $fullEntityName(...$constructorArgs);
        } else {
            throw new \InvalidArgumentException("Class $fullEntityName doesn't exists");
        }
    }
}