<?php

namespace AboutYou\Services;


class PriceOrderedProductService extends BaseOrderedProductService
{
    /**
     * @inheritdoc
     */
    protected function getComparisonClosure(){
        return function($firstProduct, $secondProduct){
            $firstPrice = is_null($firstProduct->defaultVariant) ? 0 : $firstProduct->defaultVariant->price->current;
            $secondPrice = is_null($secondProduct->defaultVariant) ? 0 : $secondProduct->defaultVariant->price->current;

            if ($firstPrice == $secondPrice) {
                return 0;
            }
            return ($firstPrice < $secondPrice) ? -1 : 1;
        };
    }
}
