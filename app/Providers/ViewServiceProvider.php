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
        ],
        ClientViewComposer::class);
    }
}
