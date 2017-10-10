<?php

namespace AboutYou\Service;

/**
 * This class is an (unfinished) example implementation of an unordered product service.
 */
class UnorderedProductService implements ProductServiceInterface
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    /**
     * Maps from category name to the id for the category service.
     *  
     * @var array
     */
    private $categoryNameToIdMapping = [
        'Clothes' => 17325
    ];

    /**
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
       $this->productService = $productService;
    }

    /**
     * @inheritdoc
     */
    public function getProductsForCategory($categoryName)
    {
        if (!isset($this->categoryNameToIdMapping[$categoryName]))
        {
            throw new \InvalidArgumentException(sprintf('Given category name [%s] is not mapped.', $categoryName));
        }

        $categoryId = $this->categoryNameToIdMapping[$categoryName];
        $productResults = $this->productService->getProductsForCategory($categoryId);
    }
}
