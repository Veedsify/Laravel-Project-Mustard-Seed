<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\ContactPage;
use App\Models\HomepageData;
use App\Models\PageHeaderImages;
use App\Policies\BlogPolicy;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View as FacadesView;
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
            Js::make('axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js'),
            Js::make('aws', 'https://sdk.amazonaws.com/js/aws-sdk-2.410.0.min.js'),
            Js::make('custom-scripts', __DIR__ . '/../../resources/js/custom.js'),
            Js::make('swal', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js'),
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FacadesView::composer('*', function ($view) {
            $view->with('headerImages', PageHeaderImages::first());
        });
        FacadesView::composer('*', function ($view) {
            $view->with('footerContactData', ContactPage::first());
        });
        FacadesView::composer('*', function ($view) {
            $view->with('homePage', HomepageData::first());
        });
    }
}
