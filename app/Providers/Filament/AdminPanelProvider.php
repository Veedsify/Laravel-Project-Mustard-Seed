<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Resources\DashboardResource\Pages\Dashboard;
use App\Filament\Admin\Resources\UserResource\Pages\Settings;
use App\Filament\Admin\Resources\UserResource\Pages\SortUsers;
use App\Http\Middleware\CheckUserIsAdmin;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
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
use App\Filament\Admin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->brandName('Mustards')
            // ->spa()
            ->path('admin')
            ->font('Instrument Sans')
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
                \App\Filament\Pages\Dashboard::class,
                \App\Filament\Admin\Pages\Settings::class
            ])
            ->navigationGroups([
                'Blogs',
                'Locations',
                'Services',
                'Campaigns & Donations',
                'Events',
                'Testimonails',
                'Users',
                'Settings',
            ])
            ->sidebarFullyCollapsibleOnDesktop()
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')
            ->widgets([
                Admin\Widgets\UsersOverview::class,
                Widgets\AccountWidget::class,
                //                Widgets\FilamentInfoWidget::class,
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
                // CheckUserIsAdmin::class,
            ]);
    }
}
