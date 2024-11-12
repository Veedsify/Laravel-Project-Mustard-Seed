<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\LocationResource\Pages;
use App\Filament\Admin\Resources\LocationResource\RelationManagers;
use App\Models\Location;
use Faker\Extension\CountryExtension;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Log;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-s-map-pin';
    protected static ?string $navigationGroup = 'Locations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Location Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('name')->label('Name')->placeholder('Name of the location')->required()->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255)->columnSpanFull(),
                        Forms\Components\TextInput::make('address')->label('Address')->placeholder('Address of the location')->required()->columnSpanFull(),
                        Forms\Components\TextInput::make('city')->label('City')->placeholder('City of the location')->required()->columnSpanFull(),
                        Forms\Components\TextInput::make('state')->label('State')->placeholder('State of the location')->required()->columnSpanFull(),
                        Forms\Components\TextInput::make('zip')->label('Zip')->placeholder('Zip code of the location')->required()->columnSpanFull(),
                        Forms\Components\Select::make('country')->label('Country')->options([
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                            fake()->countryCode => fake()->country,
                        ])->required(),
                    ]),
                ])->columnSpan(2),
            ])->columns(3);
    }

    // Method 2: Using a custom action
       public function getActions(): array
       {
           return [
               Actions\CreateAction::make()
                   ->after(function (Customer $record) {
                       Mail::to($record->email)->send(new CustomerCreatedMail($record));
                   }),
           ];
       }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->label("Name")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("address")->label("Address")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("city")->label("City")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("state")->label("State")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("zip")->label("Zip")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("country")->label("Country")->searchable()->sortable(),
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
