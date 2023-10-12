<?php

namespace App\Providers;

use App\Repositories\Contracts\AdminRepositoryInterface;
use App\Repositories\Contracts\AttributeRepositoryInterface;
use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\DiscountRepositoryInterface;
use App\Repositories\Contracts\MediaRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Eloquent\AttributeRepository;
use App\Repositories\Eloquent\BannerRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\DiscountRepository;
use App\Repositories\Eloquent\MediaRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(MediaRepositoryInterface::class,MediaRepository::class);
        $this->app->bind(AttributeRepositoryInterface::class,AttributeRepository::class);
        $this->app->bind(BannerRepositoryInterface::class,BannerRepository::class);
        $this->app->bind(DiscountRepositoryInterface::class,DiscountRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
