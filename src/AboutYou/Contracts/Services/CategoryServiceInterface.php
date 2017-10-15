<?php

namespace AboutYou\Contracts\Services;


interface CategoryServiceInterface
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
     */
    public function getCategoryByName($name);
}
