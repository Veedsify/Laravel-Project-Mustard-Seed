<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewUsersTable extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';
    protected static ?string $label = 'New Platform Users';
    protected static ?int $sort = 4;
    protected static bool $isLazy = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->latest()->limit(5))
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('role')->sortable()->searchable(),
                Tables\Columns\IconColumn::make('admin_approved')->boolean()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->date()
            ]);
    }
}
