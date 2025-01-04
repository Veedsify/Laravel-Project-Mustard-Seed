<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\ApplicantFromOrganizationResource\Pages;
use App\Http\Middleware\CheckUserIsValidOrganization;
use App\Models\ApplicantFromOrganization;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantFromOrganizationResource extends Resource
{
    protected static ?string $model = ApplicantFromOrganization::class;

    protected static ?string $navigationIcon = 'codicon-organization';
    protected static ?string $navigationGroup = 'Donations';
    protected static string|array $routeMiddleware = [CheckUserIsValidOrganization::class];

    public static function shouldRegisterNavigation(): bool
    {
        $userIsValidOrganization = Auth::user()->is_valid_organisation;
        return Auth::check() && $userIsValidOrganization;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Applicant Details')
                    ->description('Please provide the following information to create a new applicant.')
                    ->schema([
                        Forms\Components\Select::make('item_id')
                            ->searchable()
                            ->label('Item')
                            ->native(false)
                            ->options(
                                fn() => \App\Models\Item::all()
                                    ->pluck(
                                        'name',
                                        'id'
                                    )
                            )
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required(),
                        Forms\Components\TextInput::make('position')
                            ->label('Occupation')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->label('Item Received By Applicant')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('item.name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('position')
                    ->label('Occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListApplicantFromOrganizations::route('/'),
            'create' => Pages\CreateApplicantFromOrganization::route('/create'),
            'view' => Pages\ViewApplicantFromOrganization::route('/{record}'),
            'edit' => Pages\EditApplicantFromOrganization::route('/{record}/edit'),
        ];
    }
}
