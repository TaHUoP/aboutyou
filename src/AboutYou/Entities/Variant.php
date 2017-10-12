<?php

namespace AboutYou\Entities;


class Variant
{
    /**
     * Id of the Variant.
     *
     * @var int
     */
    public $id;

    /**
     * Defines if the Variant is default for the product.
     *
     * @var bool
     */
    public $isDefault;

    /**
     * Defines if the Variant is Available or not.
     * 
     * @var bool
     */
    public $isAvailable;

    /**
     * Number of available items in stock.
     *
     * @var int
     */
    public $quantity;

    /**
     * Size of the Variant.
     *
     * @var mixed
     */
    public $size;

    /**
     * Variant price.
     * 
     * @var \AboutYou\Entities\Price
     */
    public $price;

    /**
     * Product that the Variant belongs to.
     *
     * @var \AboutYou\Entities\Product
     */
    public $product;
}
