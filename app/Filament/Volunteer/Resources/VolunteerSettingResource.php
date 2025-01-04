<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\VolunteerSettingResource\Pages;
use App\Models\State;
use App\Models\User;
use App\Models\VolunteerSetting;
use AWS\CRT\Log;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;

class VolunteerSettingResource extends Resource
{
    protected static ?string $model = VolunteerSetting::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog';

    protected static ?string $navigationGroup = 'Volunteers';

    private function hasSettings()
    {
        return Auth::user()->volunteer_settings->count() > 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->columnSpan(3)
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
                    ->columnSpan(2)
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
                        Forms\Components\Select::make('state')
                            ->options(fn() => State::all()->pluck('name', 'name'))
                            ->native(false)
                            ->preload()
                            ->searchable()
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
            ])->columns(5);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', Auth::user()->id)->latest()->limit(1);
            })
            ->columns([
                ImageColumn::make('image')
                    ->label('Image'),
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
