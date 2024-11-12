<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CheckIsVolunteer;
use App\Http\Middleware\CheckUserIsNotDisabled;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class VolunteerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('volunteer')
            ->font('Lexend')
            ->spa()
            ->brandName("Mustard Seed Charity")
            ->path('/dashboard/volunteer')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Volunteer/Resources'), for: 'App\\Filament\\Volunteer\\Resources')
            ->discoverPages(in: app_path('Filament/Volunteer/Pages'), for: 'App\\Filament\\Volunteer\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Volunteer/Widgets'), for: 'App\\Filament\\Volunteer\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->navigationGroups([
                'Items',
                'Blogs',
                'Locations',
                'Jobs',
                'Donations',
                'Campaigns',
                'Events',
                'Testimonials',
                'Volunteers',
                'Settings',
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                CheckIsVolunteer::class,
                CheckUserIsNotDisabled::class
            ]);
    }
}
