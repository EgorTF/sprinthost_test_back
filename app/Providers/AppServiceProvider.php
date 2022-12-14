<?php

namespace App\Providers;

use App\Domain\Animals\Models\Animal;
use App\Observer\AnimalObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Animal::observe(AnimalObserver::class);
    }
}
