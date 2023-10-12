<?php

namespace App\Providers;


use App\Models\Banner;
use App\Models\Product;
use App\Observers\BannerObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        Banner::observe(BannerObserver::class);
    }
}
