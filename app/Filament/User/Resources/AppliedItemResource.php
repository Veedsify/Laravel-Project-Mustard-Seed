<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\AppliedItemResource\Pages;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\AppliedItem;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class AppliedItemResource extends Resource
{
    protected static ?string $model = AppliedItem::class;

    protected static ?string $navigationIcon = 'heroicon-s-cursor-arrow-ripple';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'My Applied Items';
    protected static ?string $title = 'My Applied Items';
    protected static ?string $recordTitleAttribute = 'title';
    protected static string|array $routeMiddleware = [CheckUserIsIdVerified::class];

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return "Applied Items";
    }
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'user.name',
            'first_name',
            'last_name',
            'reason',
            'unit',
            'is_approved',
        ];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'User' => $record->user->name,
            'Item' => $record->item->name,
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('item.image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('item.name')
                    ->label('Item Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reason')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppliedItems::route('/'),
            'create' => Pages\CreateAppliedItem::route('/create'),
            'edit' => Pages\EditAppliedItem::route('/{record}/edit'),
        ];
    }
}
