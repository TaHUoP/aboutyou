<?php

namespace AboutYou\Entities;


class Category
{
    /**
     * Id of the Category.
     *
     * @var int
     */
    public $id;

    /**
     * Name of the Category.
     *
     * @var string
     */
    public $name;

    /**
     * List of Products that belong to a Category.
     *
     * @var \AboutYou\Entities\Product[]
     */
    public $products = [];

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }
}
