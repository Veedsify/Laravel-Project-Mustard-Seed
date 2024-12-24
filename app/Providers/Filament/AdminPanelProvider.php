<?php

namespace App\Providers\Filament;

use App\Filament\Admin;
use App\Http\Middleware\CheckUserIsAdmin;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Panel;
use Filament\Pages;
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

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->brandName('Mustards')
            ->brandLogo('assets/images/logo/mustard_seed_logo.jpg')
            // ->spa()
            ->path('admin')
            ->font('Sora')
            ->defaultThemeMode(ThemeMode::Dark)
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors([
                'primary' => Color::Emerald,
                'secondary' => Color::hex("#000"),
                'background' => Color::hex("#000"),
            ])
            ->userMenuItems([
                'profile' => MenuItem::make()->label('Profile')
                    ->icon('heroicon-s-user')->url('/admin/profile'),
                'settings' => MenuItem::make()->label('Settings')->icon('heroicon-s-cog')->url('/admin/settings'),
                'logout' => MenuItem::make()->label('Log Out')->icon('heroicon-s-arrow-left-end-on-rectangle'),
            ])
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\\Filament\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\\Filament\\Admin\\Pages')
            ->pages([
                Pages\Dashboard::class,
                \App\Filament\Admin\Pages\Settings::class,
            ])
            ->navigationGroups([
                'Blogs',
                'Jobs',
                'Locations',
                'Services',
                'Campaigns & Donations',
                'Events',
                'Testimonails',
                'Users',
                'About Page Config',
                'Settings',
            ])
            ->sidebarFullyCollapsibleOnDesktop()
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')
            ->widgets([
                Admin\Widgets\UsersOverview::class,
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
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
                CheckUserIsAdmin::class,
            ]);
    }
}
