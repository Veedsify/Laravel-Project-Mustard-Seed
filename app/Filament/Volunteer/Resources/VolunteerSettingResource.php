<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\VolunteerSettingResource\Pages;
use App\Filament\Volunteer\Resources\VolunteerSettingResource\RelationManagers;
use App\Models\VolunteerSetting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class VolunteerSettingResource extends Resource
{
    protected static ?string $model = VolunteerSetting::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog';

    protected static ?string $navigationGroup = 'Volunteers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('organization')
                            ->label('Organization Name')
                            ->required(),
                        FileUpload::make('image')
                            ->label('Image'),
                        Forms\Components\TextInput::make('age')
                            ->label('Founded Year')
                            ->required(),
                        Forms\Components\RichEditor::make('bio')
                            ->label('Bio')
                            ->required(),
                    ]),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('Phone')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required(),
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->label('Address')
                            ->required(),
                        Forms\Components\TextInput::make('city')
                            ->label('City')
                            ->required(),
                        Forms\Components\TextInput::make('state')
                            ->label('State')
                            ->required(),
                        Forms\Components\TextInput::make('country')
                            ->label('Country')
                            ->required(),
                        Forms\Components\TextInput::make('zip')
                            ->label('Zip')
                            ->required(),
                    ]),

                Forms\Components\Section::make('Social Media')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->required(),
                        Forms\Components\TextInput::make('twitter')
                            ->label('Twitter')
                            ->required(),
                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn')
                            ->required(),
                    ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->columns([
                TextColumn::make('organization')
                    ->searchable()
                    ->label('Organization')
                    ->sortable(),
                TextColumn::make('age')
                    ->label('Age')
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable(),
                TextColumn::make('city')
                    ->label('City')
                    ->sortable(),
                TextColumn::make('state')
                    ->label('State')
                    ->sortable(),
                TextColumn::make('country')
                    ->label('Country')
                    ->sortable(),
                TextColumn::make('zip')
                    ->label('Zip')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->paginated(false)
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListVolunteerSettings::route('/'),
            'create' => Pages\CreateVolunteerSetting::route('/create'),
            'edit' => Pages\EditVolunteerSetting::route('/{record}/edit'),
        ];
    }
}
