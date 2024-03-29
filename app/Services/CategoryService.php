<?php


namespace App\Services;


use App\Abstractions\ServiceDTO;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Services\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get categories by limit
     *
     * @param $limit
     * @return ServiceDTO
     */
    public function getCategoriesByLimit($limit): ServiceDTO
    {
        $categories = $this->categoryRepository->getCategoriesByLimit($limit);
        return new ServiceDTO('List of Categories', 200, $categories);
    }

    /**
     * Get category with posts
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function getCategoryWithPosts($slug): ServiceDTO
    {
        $category = $this->categoryRepository->getCategoryWithPosts($slug);
        return new ServiceDTO('Category with list of posts', 200, $category);
    }

    /**
     * Get category with products
     *
     * @param $slug
     * @return ServiceDTO
     */
    public function getCategoryWithProducts($slug): ServiceDTO
    {
        $category = $this->categoryRepository->getCategoryWithProducts($slug);
        return new ServiceDTO('Category with list of products', 200, $category);
    }
}