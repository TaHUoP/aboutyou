<?php

namespace AboutYou\Services;

use AboutYou\Contracts\Services\CategoryServiceInterface;
use AboutYou\Contracts\Services\ProductServiceInterface;

class UnorderedProductService implements ProductServiceInterface
{
    /**
     * @var CategoryServiceInterface
     */
    protected $categoryService;

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
