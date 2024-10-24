<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PrivacyPolicyResource\Pages;
use App\Filament\Admin\Resources\PrivacyPolicyResource\RelationManagers;
use App\Models\PrivacyPolicy;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrivacyPolicyResource extends Resource
{
    protected static ?string $model = PrivacyPolicy::class;

    protected static ?string $navigationIcon = 'heroicon-s-eye-slash';
    protected static ?string $navigationGroup = 'Configs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Privacu Policy')->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    Forms\Components\RichEditor::make('content')
                        ->label('Content')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('content')->words('20')->html(),
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
            'index' => Pages\ListPrivacyPolicies::route('/'),
            'create' => Pages\CreatePrivacyPolicy::route('/create'),
            'edit' => Pages\EditPrivacyPolicy::route('/{record}/edit'),
        ];
    }
}
