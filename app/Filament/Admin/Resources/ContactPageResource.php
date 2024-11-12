<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactPageResource\Pages;
use App\Models\ContactPage;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactPageResource extends Resource
{
    protected static ?string $model = ContactPage::class;

    protected static ?string $navigationIcon = 'heroicon-s-phone';
    protected static ?string $navigationGroup = 'Contacts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Contact Information')->schema([
                    TextInput::make('phone')
                        ->label('Phone')
                        ->placeholder('Enter the phone number'), 
                    TextInput::make('email')
                        ->label('Email')
                        ->placeholder('Enter the email address')
                        ->required(),
                    TextInput::make('location')
                        ->label('Address')
                        ->placeholder('Enter the location')
                        ->required(),
                    Textarea::make('address')
                        ->label('Address')
                        ->placeholder('Enter the address')
                        ->required(),
                    Textarea::make('map_embed')
                        ->label('Map Embed')
                        ->placeholder('Enter the map embed code')
                        ->required(),
                    TextInput::make('facebook')
                        ->label('Facebook')
                        ->placeholder('Enter the Facebook URL'),
                    TextInput::make('twitter')
                        ->label('Twitter')
                        ->placeholder('Enter the Twitter URL'),
                    TextInput::make('instagram')
                        ->label('Instagram')
                        ->placeholder('Enter the Instagram URL'),
                    TextInput::make('linkedin')
                        ->label('LinkedIn')
                        ->placeholder('Enter the LinkedIn URL'),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phone')
                    ->searchable()
                    ->label('Phone'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('location')
                    ->searchable()
                    ->label('Location'),
                TextColumn::make('address')
                    ->searchable()
                    ->label('Address'),
                TextColumn::make('facebook')
                    ->searchable()
                    ->label('Facebook'),
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
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListContactPages::route('/'),
            'create' => Pages\CreateContactPage::route('/create'),
            'edit' => Pages\EditContactPage::route('/{record}/edit'),
        ];
    }
}
