<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TermOfServiceResource\Pages;
use App\Filament\Admin\Resources\TermOfServiceResource\RelationManagers;
use App\Models\TermOfService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TermOfServiceResource extends Resource
{
    protected static ?string $model = TermOfService::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Configs';

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
            'index' => Pages\ListTermOfServices::route('/'),
            'create' => Pages\CreateTermOfService::route('/create'),
            'edit' => Pages\EditTermOfService::route('/{record}/edit'),
        ];
    }
}
