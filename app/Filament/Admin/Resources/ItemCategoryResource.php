<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ItemCategoryResource\Pages;
use App\Filament\Admin\Resources\ItemCategoryResource\RelationManagers;
use App\Models\ItemCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemCategoryResource extends Resource
{
    protected static ?string $model = ItemCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'Campaigns & Donations';
    protected static ?int $sort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Item Category Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('name')->label('Name')->placeholder('Name of the item category')->required()->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255)->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')->label('Description')->placeholder('Description of the item category')->required()->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')->label('Image')->required()->columnSpanFull(),
                        Forms\Components\Select::make('status')->label('Status')->options([
                            'draft' => 'Draft',
                            'active' => 'Active',
                        ])->required(),

                    ]),
                ])->columnSpan(2),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(30)->html(),
                Tables\Columns\TextColumn::make('status')->sortable()->badge(fn($record) => match ($record->status) {
                    'active' => 'success',
                    'draft' => 'danger',
                }),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('created_at')->sortable(),
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
            'index' => Pages\ListItemCategories::route('/'),
            'create' => Pages\CreateItemCategory::route('/create'),
            'edit' => Pages\EditItemCategory::route('/{record}/edit'),
        ];
    }
}
