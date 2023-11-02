<?php

namespace App\Providers;


use App\ViewComposers\ClientViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer([
            'client.layout.navbar',
<<<<<<< HEAD
=======
            'client.home-page.index',
            'client.product.list',
            'client.product.detail',
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        ],
        ClientViewComposer::class);
    }
}
