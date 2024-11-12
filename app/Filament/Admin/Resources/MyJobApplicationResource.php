<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MyJobApplicationResource\Pages;
use App\Filament\Admin\Resources\MyJobApplicationResource\RelationManagers;
use App\Models\MyJobApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MyJobApplicationResource extends Resource
{
    protected static ?string $model = MyJobApplication::class;

    protected static ?string $navigationIcon = 'heroicon-s-book-open';
    protected static ?string $navigationGroup = 'Jobs';

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
            'index' => Pages\ListMyJobApplications::route('/'),
            'create' => Pages\CreateMyJobApplication::route('/create'),
            'edit' => Pages\EditMyJobApplication::route('/{record}/edit'),
        ];
    }
}
