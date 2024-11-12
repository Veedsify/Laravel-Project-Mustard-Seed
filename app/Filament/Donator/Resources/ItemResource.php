<?php

namespace App\Filament\Donator\Resources;

use App\Filament\Donator\Resources\ItemResource\Pages;
use App\Filament\Donator\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-s-window';
    protected static ?string $navigationGroup = 'Donate';
    protected static ?string $navigationLabel = 'Donate';
    protected static ?string $title = 'New Donation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section that spans 2 columns
                Section::make('Main Details')
                    ->columnSpan(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')->label('Name')->required()->live(onBlur: true)->columnSpan('full')
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')->readOnly()->columnSpan('full')->unique(
                            'items',
                            'slug',
                            ignoreRecord: true
                        )->label('Slug')->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required(),
                        Forms\Components\RichEditor::make('content')
                            ->label('Content')
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Image')
                            ->image(),
                    ]),
                // Section that stays in 1 column
                Section::make('Additional Details')
                    ->columnSpan(1)
                    ->schema([
                        Forms\Components\TextInput::make('quantity')
                            ->label('Quantity')
                            ->required(),
                        Forms\Components\TextInput::make('unit')
                            ->label('Unit')
                            ->required(),
                        Forms\Components\TextInput::make('category')
                            ->label('Category')
                            ->required(),
                        Forms\Components\Select::make('condition')
                            ->options([
                                0 => 'Used',
                                1 => 'New',
                            ])
                            ->native(false)
                            ->required()
                            ->label('Condition'),
                        Forms\Components\Checkbox::make('is_anonymous')
                            ->label('Post as Anonymous'),
                        Forms\Components\Select::make('volunteer_id')
                            ->label('Select an Agent')
                            ->searchable()
                            ->relationship('volunteer', 'name'),
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
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('unit'),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('condition'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('user.name')->searchable()->sortable()
                    ->label('User'),
                Tables\Columns\TextColumn::make('volunteer.name')->searchable()->sortable()
                    ->label('Agent'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
