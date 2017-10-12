<?php

namespace AboutYou\DataSources;


use AboutYou\Contracts\DataSources\DataSourceInterface;

class JsonDataSource implements DataSourceInterface
{
    /**
     * Maps from category name to the id for the category service.
     *
     * @var array
     */
    private $categoryNameToIdMapping = [
        'Clothes' => 17325
    ];

    /**
     * @inheritdoc
     */
    public function getCategoryById($id)
    {

    }

    /**
     * @inheritdoc
     */
    public function getCategoryByName($name)
    {
        if (!isset($this->categoryNameToIdMapping[$name]))
        {
            throw new \InvalidArgumentException(sprintf('Given category name [%s] is not mapped.', $name));
        }
    }
}