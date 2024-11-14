<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\Widget;

class UserIntroGuide extends Widget
{
    protected static string $view = 'filament.user.widgets.user-intro-guide';
    protected int|string|array $columnSpan = 'full';
}
