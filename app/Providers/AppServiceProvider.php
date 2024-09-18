<?php

namespace App\Providers;

use App\Models\Blog;
use App\Policies\BlogPolicy;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::policy(Blog::class, BlogPolicy::class);
        FilamentAsset::register([
            Js::make('custom-scripts',  __DIR__ . '/../../resources/js/custom.js'),
            Js::make('swal', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js'),
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
