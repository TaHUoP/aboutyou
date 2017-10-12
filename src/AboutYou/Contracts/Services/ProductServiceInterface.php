<?php

namespace AboutYou\Contracts\Services;

/**
 * The implementation is responsible for resolving the id of the category from the
 * given category name (in this simple case via an array of CategoryName => id). The second
 * responsibility is to sort the returning result from the category service in whatever
 * way. 
 * 
 * This breaks with the rule of the separation of concerns, but for this test case we want to
 * keep it simple.
 */
interface ProductServiceInterface
{
    /**
     * This method should read from a data source (JSON in our case)
     * and return an unsorted list of products found in the data source.
     *
     * @param integer $categoryId
     *
     * @return \AboutYou\Entities\Product[]
     */
    public function getProductsByCategoryId($categoryId);

    /**
     * Get Products by Category name.
     *
     * @param string $categoryName
     *
     * @return \AboutYou\Entities\Product[]
     *
     * @throws \InvalidArgumentException if category name is unknown.
     */
    public function getProductsByCategoryName($categoryName);
}