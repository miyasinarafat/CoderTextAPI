<?php

namespace App\Providers;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Repositories\GlobalRepositoryInterface;
use App\Contracts\Repositories\PageRepositoryInterface;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\CategoryServiceInterface;
use App\Contracts\Services\GlobalServiceInterface;
use App\Contracts\Services\PageServiceInterface;
use App\Contracts\Services\PostServiceInterface;
use App\Contracts\Services\ProductServiceInterface;
use App\Contracts\Services\SettingServiceInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\GlobalRepository;
use App\Repositories\PageRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SettingRepository;
use App\Services\CategoryService;
use App\Services\GlobalService;
use App\Services\PageService;
use App\Services\PostService;
use App\Services\ProductService;
use App\Services\SettingService;
use Illuminate\Support\ServiceProvider;

class RegisterServicesAndRepositories extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register Repositories
        $this->repositories();

        // Register Services
        $this->services();
    }

    private function repositories()
    {
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(GlobalRepositoryInterface::class, GlobalRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
    }

    private function services()
    {
        $this->app->bind(SettingServiceInterface::class, SettingService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(GlobalServiceInterface::class, GlobalService::class);
        $this->app->bind(PageServiceInterface::class, PageService::class);
    }
}
