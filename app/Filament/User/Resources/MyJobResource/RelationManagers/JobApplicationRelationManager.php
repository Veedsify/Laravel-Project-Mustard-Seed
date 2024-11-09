<?php

namespace App\Filament\User\Resources\MyJobResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class JobApplicationRelationManager extends RelationManager
{
    protected static string $relationship = 'jobApplication';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('cover_letter')
                    ->required(),
                Forms\Components\FileUpload::make('resume')
                    ->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Job Applications')
            ->emptyStateHeading('No Job Applications')
            ->emptyStateDescription('Job Applications will appear here once they are created.')
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('cover_letter'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
