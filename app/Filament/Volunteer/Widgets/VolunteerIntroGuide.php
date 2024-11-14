<?php

namespace App\Filament\Volunteer\Widgets;

use Filament\Widgets\Widget;

class VolunteerIntroGuide extends Widget
{
    protected static string $view = 'filament.volunteer.widgets.volunteer-intro-guide';
    protected int|string|array $columnSpan = 'full';
}
