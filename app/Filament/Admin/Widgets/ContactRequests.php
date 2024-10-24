<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ContactRequests extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static ?string $heading = 'Contact Requests';
    protected static ?string $description = 'These are the latest contact requests.';
    protected static ?int $sort = 7;
    protected static bool $isLazy = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contact::query()->latest()->limit(8)
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('fullname'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('message')->words(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ]);
    }
}
