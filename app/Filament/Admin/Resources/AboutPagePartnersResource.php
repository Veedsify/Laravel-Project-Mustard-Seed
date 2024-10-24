<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AboutPagePartnersResource\Pages;
use App\Models\AboutPagePartners;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutPagePartnersResource extends Resource
{
    protected static ?string $model = AboutPagePartners::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $title = 'Partners';

    protected static ?string $navigationGroup = 'About Page Config';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('About Page Partners Information')->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Name')
                        ->columnSpan(2)
                        ->required(),
                        Forms\Components\FileUpload::make('image')
                        ->label('Image')
                        ->columnSpan(2)
                        ->required(),
                        Forms\Components\TextInput::make('link')
                        ->label('Link')
                        ->columnSpan(2)
                        ->required(),
                ])->columns(3),
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
            'index' => Pages\ListAboutPagePartners::route('/'),
            'create' => Pages\CreateAboutPagePartners::route('/create'),
            'edit' => Pages\EditAboutPagePartners::route('/{record}/edit'),
        ];
    }
}
