<?php

namespace AboutYou\Contracts\DataSources;


interface DataSourceInterface
{
    /**
     * @param integer $id
     *
     * @return \AboutYou\Entities\Category
     */
    public function getCategoryById($id);

    /**
     * @param string $name
     *
     * @return \AboutYou\Entities\Category
     *
     * @throws \InvalidArgumentException if category name is unknown.
     */
    public function getCategoryByName($name);
}