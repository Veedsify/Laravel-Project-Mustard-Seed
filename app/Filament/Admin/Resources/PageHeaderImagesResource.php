<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PageHeaderImagesResource\Pages;
use App\Filament\Admin\Resources\PageHeaderImagesResource\RelationManagers;
use App\Models\PageHeaderImages;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageHeaderImagesResource extends Resource
{
    protected static ?string $model = PageHeaderImages::class;

    protected static ?string $navigationIcon = 'heroicon-s-photo';

    protected static ?string $navigationGroup = 'Configs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Banner Image")
                ->description("Upload images for each page header.")
                ->schema([
                    FileUpload::make('home_page_header_image')
                        ->label('Home Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('about_page_header_image')
                        ->label('About Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('campaigns_page_header_image')
                        ->label('Campaigns Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('donations_page_header_image')
                        ->label('Donations Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('blogs_page_header_image')
                        ->label('Blogs Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('volunteers_page_header_image')
                        ->label('Volunteers Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('faq_page_header_image')
                        ->label('FAQ Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('privacy_page_header_image')
                        ->label('Privacy Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('terms_page_header_image')
                        ->label('Terms Page Header Image')
                        ->columnSpan(1),
                    FileUpload::make('contact_page_header_image')
                        ->label('Contact Page Header Image')
                        ->columnSpan(1),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('home_page_header_image')
                    ->label('Home Page Header Image'),
                ImageColumn::make('about_page_header_image')
                    ->label('About Page Header Image'),
                ImageColumn::make('campaigns_page_header_image')
                    ->label('Campaigns Page Header Image'),
                ImageColumn::make('donations_page_header_image')
                    ->label('Donations Page Header Image'),
                ImageColumn::make('blogs_page_header_image')
                    ->label('Blogs Page Header Image'),
                ImageColumn::make('volunteers_page_header_image')
                    ->label('Volunteers Page Header Image'),
                ImageColumn::make('faq_page_header_image')
                    ->label('FAQ Page Header Image'),
                ImageColumn::make('privacy_page_header_image')
                    ->label('Privacy Page Header Image'),
                ImageColumn::make('terms_page_header_image')
                    ->label('Terms Page Header Image'),
                ImageColumn::make('contact_page_header_image')
                    ->label('Contact Page Header Image'),
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
            'index' => Pages\ListPageHeaderImages::route('/'),
            'create' => Pages\CreatePageHeaderImages::route('/create'),
            'edit' => Pages\EditPageHeaderImages::route('/{record}/edit'),
        ];
    }
}
