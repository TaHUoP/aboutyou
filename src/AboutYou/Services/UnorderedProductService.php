<?php

namespace AboutYou\Service;

use AboutYou\Contracts\Services\CategoryServiceInterface;
use AboutYou\Contracts\Services\ProductServiceInterface;

/**
 * This class is an (unfinished) example implementation of an unordered product service.
 */
class UnorderedProductService implements ProductServiceInterface
{
    /**
     * @var CategoryServiceInterface
     */
    private $categoryService;

    /**
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
       $this->categoryService = $categoryService;
    }

    /**
     * @inheritdoc
     */
    public function getProductsByCategoryId($categoryId)
    {
        $category = $this->categoryService->getCategoryById($categoryId);

        return $category->getProducts();
    }

    /**
     * @inheritdoc
     */
    public function getProductsByCategoryName($categoryName)
    {
        $category = $this->categoryService->getCategoryByName($categoryName);

        return $category->getProducts();
    }
}
