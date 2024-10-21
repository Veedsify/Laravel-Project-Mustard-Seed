<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\AppliedItemResource\Pages;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\AppliedItem;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AppliedItemResource extends Resource
{
    protected static ?string $model = AppliedItem::class;

    protected static ?string $navigationIcon = 'heroicon-s-cursor-arrow-ripple';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Applied Items';
    protected static ?string $title = 'Applied Items';
    protected static string|array $routeMiddleware = [CheckUserIsIdVerified::class];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
