<?php

namespace AboutYou\Factories;


abstract class BaseFactory implements FactoryInterface
{
    abstract protected function getNamespace();

    /**
     * @inheritdoc
     */
    public function make($entityName)
    {
        $fullEntityName = $this->getNamespace() . "$entityName";

        if(class_exists($fullEntityName)){
            return new $fullEntityName();
        } else {
            throw new \InvalidArgumentException("Class $fullEntityName doesn't exists");
        }
    }
}