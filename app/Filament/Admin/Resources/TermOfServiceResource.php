<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TermOfServiceResource\Pages;
use App\Filament\Admin\Resources\TermOfServiceResource\RelationManagers;
use App\Models\TermOfService;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PHPUnit\Framework\Constraint\IsFalse;

class TermOfServiceResource extends Resource
{
    protected static ?string $model = TermOfService::class;

    protected static ?string $navigationIcon = 'heroicon-s-no-symbol';
    protected static ?string $navigationGroup = 'Configs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Terms Of Service')
                    ->schema([
                        TextInput::make('title'),
                        RichEditor::make('content')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('content')->words('20')->html()
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
            'index' => Pages\ListTermOfServices::route('/'),
            'create' => Pages\CreateTermOfService::route('/create'),
            'edit' => Pages\EditTermOfService::route('/{record}/edit'),
        ];
    }
}
