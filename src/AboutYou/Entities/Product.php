<?php

namespace AboutYou\Entities;


class Product extends BaseEntity
{
    /**
     * Id of the Product.
     *
     * @var int
     */
    private $id;

    /**
     * Name of the Product.
     *
     * @var string
     */
    private $name;

    /**
     * Description of the Product.
     *
     * @var string
     */
    private $description;

    /**
     * Unsorted list of Variants with their corresponding prices.
     *
     * @var \AboutYou\Entities\Variant[]
     */
    private $variants = [];

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
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param \AboutYou\Entities\Variant[] $variants
     */
    public function setVariants($variants)
    {
        $this->variants = array_filter($variants, function($value){return $value instanceof Variant;});

        foreach ($this->variants as $variant){
            $variant->product = $this;
        }
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \AboutYou\Entities\Variant[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @return \AboutYou\Entities\Variant|null
     */
    public function getDefaultVariant()
    {
        foreach ($this->variants as $variant){
            if($variant->isDefault){
                return $variant;
            }
        }

        return null;
    }
}
