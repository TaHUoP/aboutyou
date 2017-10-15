<?php

namespace AboutYou\Entities;


use AboutYou\Contracts\Validators\Validatable;

class Variant extends BaseEntity implements Validatable
{
    /**
     * Id of the Variant.
     *
     * @var int
     */
    private $id;

    /**
     * Defines if the Variant is default for the product.
     *
     * @var bool
     */
    private $isDefault;

    /**
     * Defines if the Variant is Available or not.
     *
     * @var bool
     */
    private $isAvailable;

    /**
     * Number of available items in stock.
     *
     * @var int
     */
    private $quantity;

    /**
     * Size of the Variant.
     *
     * @var string
     */
    private $size;

    /**
     * Variant price.
     *
     * @var \AboutYou\Entities\Price
     */
    private $price;

    /**
     * Product that the Variant belongs to.
     *
     * @var \AboutYou\Entities\Product
     */
    private $product;

    /**
     * @inheritdoc
     */
    public static function getValidationRules()
    {
        return [
            'isDefault' => 'bool|required',
            'isAvailable' => 'bool|required',
            'quantity' => 'numeric|required|notNegative',
            'size' => 'validSize',
        ];
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param bool $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }

    /**
     * @param bool $isAvailable
     */
    public function setIsAvailable($isAvailable)
    {
        $this->isAvailable = $isAvailable;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @param \AboutYou\Entities\Price $price
     */
    public function setPrice(Price $price)
    {
        $this->price = $price;

        $this->price->variant = $this;
    }

    /**
     * @param \AboutYou\Entities\Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @return bool
     */
    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return \AboutYou\Entities\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return \AboutYou\Entities\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
