<?php

namespace AboutYou\Contracts\Services;


interface CategoryServiceInterface
{
    /**
     * This method should read from a data source (JSON in our case)
     * and return an unsorted list of products found in the data source.
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
     */
    public function getCategoryByName($name);
}
