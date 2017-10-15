<?php

namespace AboutYou\Contracts\DataSources;


interface DataSourceInterface
{
    /**
     * This method should read from a JSON data source
     * and return an unsorted list of categories found in the data source.
     *
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