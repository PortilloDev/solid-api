<?php

namespace App\Providers;

use App\Src\Services\BookService;
use Illuminate\Support\ServiceProvider;
use App\Src\Repository\BookServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookServiceInterface::class, BookService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
