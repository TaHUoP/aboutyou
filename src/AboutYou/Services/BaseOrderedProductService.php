<?php

namespace AboutYou\Services;


abstract class BaseOrderedProductService extends UnorderedProductService
{
    /**
     * @return callable
     */
    abstract protected function getComparisonClosure();

    /**
     * @param \AboutYou\Entities\Product[] $products
     * @return array
     */
    private function sortProducts($products){
        usort($products, $this->getComparisonClosure());

        return $products;
    }

    /**
     * @inheritdoc
     */
    public function getProductsByCategoryId($categoryId)
    {
        $products = parent::getProductsByCategoryId($categoryId);

        return $this->sortProducts($products);
    }

    /**
     * @inheritdoc
     */
    public function getProductsByCategoryName($categoryId)
    {
        $products = parent::getProductsByCategoryName($categoryId);

        return $this->sortProducts($products);
    }
}
