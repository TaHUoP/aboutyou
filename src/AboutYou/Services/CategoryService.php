<?php

namespace AboutYou\Services;

use AboutYou\Contracts\DataSources\DataSourceInterface;
use AboutYou\Contracts\Services\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var DataSourceInterface
     */
    private $dataSource;

    /**
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @inheritdoc
     */
    public function getCategoryById($id)
    {
        return $this->dataSource->getCategoryById($id);
    }

    /**
     * @inheritdoc
     */
    public function getCategoryByName($name)
    {
        return $this->dataSource->getCategoryByName($name);
    }
}
