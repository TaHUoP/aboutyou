<?php

namespace AboutYou\Entities;


class Price extends BaseEntity
{
    /**
     * Current price.
     *
     * @var int
     */
    private $current;

    /**
     * Old price.
     *
     * @var int|null
     */
    private $old;

    /**
     * Defines if the price is sale.
     *
     * @var bool
     */
    public $isSale;

    /**
     * Variant that the price belongs to.
     *
     * @var \AboutYou\Entities\Variant
     */
    private $variant;

    /**
     * @param int $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     * @param int|null $old
     */
    public function setOld($old)
    {
        $this->old = $old;
    }

    /**
     * @param bool $isSale
     */
    public function setIsSale($isSale)
    {
        $this->isSale = $isSale;
    }

    /**
     * @param \AboutYou\Entities\Variant $variant
     */
    public function setVariant(Variant $variant)
    {
        $this->variant = $variant;
    }

    /**
     * @return int
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @return int|null
     */
    public function getOld()
    {
        return $this->old;
    }

    /**
     * @return bool
     */
    public function getIsSale()
    {
        return $this->isSale;
    }

    /**
     * @return \AboutYou\Entities\Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }
}
