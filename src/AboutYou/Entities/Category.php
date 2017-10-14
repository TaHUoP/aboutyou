<?php

namespace AboutYou\Entities;


class Category extends BaseEntity
{
    /**
     * Id of the Category.
     *
     * @var int
     */
    private $id;

    /**
     * Name of the Category.
     *
     * @var string
     */
    private $name;

    /**
     * List of Products that belong to a Category.
     *
     * @var \AboutYou\Entities\Product[]
     */
    private $products = [];

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param \AboutYou\Entities\Product[] $products
     */
    public function setProducts($products)
    {
        $this->products = array_filter($products, function($value){return $value instanceof Product;});
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \AboutYou\Entities\Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
