<?php

namespace AboutYou\Services;


class PriceOrderedProductService extends UnorderedProductService
{
    /**
     * @param \AboutYou\Entities\Product[] $products
     * @return array
     */
    private function sortProducts($products){
        usort($products, function($firstProduct, $secondProduct){
            $firstPrice = is_null($firstProduct->defaultVariant) ? 0 : $firstProduct->defaultVariant->price->current;
            $secondPrice = is_null($secondProduct->defaultVariant) ? 0 : $secondProduct->defaultVariant->price->current;

            if ($firstPrice == $secondPrice) {
                return 0;
            }
            return ($firstPrice < $secondPrice) ? -1 : 1;
        });

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
