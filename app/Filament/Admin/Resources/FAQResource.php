<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FAQResource\Pages;
use App\Models\FAQ;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('FAQ Information')->schema([
                    TextInput::make('question')
                        ->label('Question')
                        ->required()
                        ->columnSpan(2),
                    Textarea::make('answer')
                        ->label('Answer')
                        ->required()
                        ->columnSpan(2),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('answer')
                    ->searchable()
                    ->words(20)
                    ->sortable(),
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
            'index' => Pages\ListFAQS::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'edit' => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }
}
