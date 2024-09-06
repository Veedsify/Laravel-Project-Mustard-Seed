<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HomepageDataResource\Pages;
use App\Filament\Admin\Resources\HomepageDataResource\RelationManagers;
use App\Models\HomepageData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomepageDataResource extends Resource
{
    protected static ?string $model = HomepageData::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

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
            'index' => Pages\ListHomepageData::route('/'),
            'create' => Pages\CreateHomepageData::route('/create'),
            'edit' => Pages\EditHomepageData::route('/{record}/edit'),
        ];
    }
}
