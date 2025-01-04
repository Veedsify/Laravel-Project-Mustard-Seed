<?php

namespace App\Filament\User\Resources\ItemResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AppliedItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'appliedItems';
    protected static bool $isLazy = false;


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Users who applied')
            ->recordTitleAttribute('first_name')
            ->columns([
                Tables\Columns\TextColumn::make('custom_username')
                ->getStateUsing(function ($record) {
                    return $record->user->custom_username ?? $record->user->username;
                }),
                Tables\Columns\TextColumn::make('reason'),
                Tables\Columns\IconColumn::make('is_approved')->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
