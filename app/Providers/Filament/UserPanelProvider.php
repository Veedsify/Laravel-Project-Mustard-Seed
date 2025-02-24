<?php

namespace App\Providers\Filament;

use App\Http\Middleware\CheckIsUser;
use App\Http\Middleware\CheckUserIsNotDisabled;
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
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

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('user')
            // ->spa()
            ->brandName("Mustard Seed Charity")
            ->path('user')
            ->colors([
                'primary' => Color::Teal,
            ])
            ->plugins([
                GlobalSearchModalPlugin::make()->closeByEscaping(enabled: false)->closeButton(enabled: true)
            ])
            ->font('Epilogue')
            ->databaseNotifications()
            ->databaseNotificationsPolling('13s')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\\Filament\\User\\Resources')
            ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\\Filament\\User\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/User/Widgets'), for: 'App\\Filament\\User\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
            ])
            ->navigationItems([
                // NavigationItem::make('Verifications')
                //     ->url('/user/verification')
                //     ->group('Settings')
                //     ->visible(fn () => true)
                //     ->icon('heroicon-s-shield-check')
                //     ->sort(-1),
            ])
            ->navigationGroups([
                'Items',
                'Blogs',
                'Locations',
                'Donations',
                'Campaigns',
                'Jobs',
                'Events',
                'Testimonials',
                'Volunteers',
                'Settings',
            ])
            ->sidebarFullyCollapsibleOnDesktop()
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
                CheckIsUser::class,
                CheckUserIsNotDisabled::class
            ]);
    }
}
