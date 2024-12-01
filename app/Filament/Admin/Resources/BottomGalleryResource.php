<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BottomGalleryResource\Pages;
use App\Models\BottomGallery;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class BottomGalleryResource extends Resource
{
    protected static ?string $model = BottomGallery::class;

    protected static ?string $navigationIcon = 'solar-gallery-minimalistic-broken';
    protected static ?string $navigationGroup = 'Configs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Add new bottom image')->schema([
                    FileUpload::make('image_path')->label('Image')->nullable(),
                    Toggle::make('status')->label('Show On Page'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path'),
                IconColumn::make('status')->label('Show On Page')->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBottomGalleries::route('/'),
            'create' => Pages\CreateBottomGallery::route('/create'),
            'view' => Pages\ViewBottomGallery::route('/{record}'),
            'edit' => Pages\EditBottomGallery::route('/{record}/edit'),
        ];
    }
}
