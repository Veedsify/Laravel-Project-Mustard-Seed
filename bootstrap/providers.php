<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    App\Providers\Filament\DonatorPanelProvider::class,
    App\Providers\Filament\UserPanelProvider::class,
    App\Providers\Filament\VolunteerPanelProvider::class,
    Laravel\Socialite\SocialiteServiceProvider::class,
];
