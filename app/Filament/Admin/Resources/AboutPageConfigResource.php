<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AboutPageConfigResource\Pages;
use App\Models\AboutPageConfig;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutPageConfigResource extends Resource
{
    protected static ?string $model = AboutPageConfig::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $title = 'About Page Settings';

    protected static ?string $navigationGroup = 'About Page Config';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('About Page Config')->schema([
                    TextInput::make('short_title')->label('Short Title')->placeholder('Short Title'),
                    TextInput::make('title')->label('Title')->placeholder('Title'),
                    FileUpload::make('main_image')->label('Main Image'),
                    RichEditor::make('content')->label('Content')->placeholder('Content'),
                    TextInput::make('donation_title')->label('Donation Title')->placeholder('Donation Title'),
                    Textarea::make('donation_content')->label('Donation Content')->placeholder('Donation Content'),
                    TextInput::make('volunteer_title')->label('Volunteer Title')->placeholder('Volunteer Title'),
                    Textarea::make('volunteer_content')->label('Volunteer Content')->placeholder('Volunteer Content'),
                    TextInput::make('read_more_title')->label('Read More Title')->placeholder('Read More Title'),
                    TextInput::make('read_more_link')->label('Read More Link')->placeholder('Read More Link'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('short_title')->label('Short Title'),
                Tables\Columns\TextColumn::make('title')->label('Title'),
                Tables\Columns\ImageColumn::make('main_image')->label('Main Image'),
                Tables\Columns\TextColumn::make('donation_title')->label('Donation Title'),
                Tables\Columns\TextColumn::make('volunteer_title')->label('Volunteer Title'),
                Tables\Columns\TextColumn::make('read_more_title')->label('Read More Title'),
                Tables\Columns\TextColumn::make('read_more_link')->label('Read More Link'),
            ])
            ->paginated(false)
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
            'index' => Pages\ListAboutPageConfigs::route('/'),
            'create' => Pages\CreateAboutPageConfig::route('/create'),
            'edit' => Pages\EditAboutPageConfig::route('/{record}/edit'),
        ];
    }
}
