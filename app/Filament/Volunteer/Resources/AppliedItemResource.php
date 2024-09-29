<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\AppliedItemResource\Pages;
use App\Filament\Volunteer\Resources\AppliedItemResource\RelationManagers;
use App\Models\AppliedItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppliedItemResource extends Resource
{
    protected static ?string $model = AppliedItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Applied Items';
    protected static ?string $title = 'New Donation';

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
