<?php

namespace AboutYou\Factories;


class EntityFactory implements BaseFactory
{
    /**
     * @inheritdoc
     */
    public function make($entityName)
    {
        $fullEntityName = "\\AboutYou\\Entities\\$entityName";

        if(class_exists($fullEntityName)){
            return new $fullEntityName();
        } else {
            throw new \InvalidArgumentException("Class $fullEntityName doesn't exists");
        }
    }
}