<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\ItemResource\Pages;
use App\Filament\User\Resources\ItemResource\RelationManagers;
use App\Filament\User\Resources\ItemResource\Widgets\TotalDonations;
use App\Models\Item;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-window';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Donate';
    protected static ?string $title = 'New Donation';
    protected static ?string $recordTitleAttribute = 'title';
 
    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return "Items for Donation";
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'description',
            'slug',
            'content',
            'quantity',
            'category.name',
            'user.name',
            'volunteer.name',
        ];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Category' => $record->category->name,
            'User' => $record->user->name,
            'Volunteer' => $record->volunteer->name,
        ];
    }

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
                            })->readOnlyOn(['edit', 'view']),
                        Forms\Components\TextInput::make('slug')->readOnly()->columnSpan('full')->unique(
                            'items',
                            'slug',
                            ignoreRecord: true
                        )->label('Slug')->required(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->readOnlyOn(['edit', 'view'])
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
                            ->readOnlyOn(['edit', 'view'])
                            ->required(),
                        Forms\Components\TextInput::make('unit')
                            ->label('Unit')
                            ->readOnlyOn(['edit', 'view'])
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            // ->options(
                            //     ItemCategory::where('status', 'active')->pluck('name', 'id')->toArray()
                            // )
                            ->searchable()
                            ->preload()
                            ->label('Category')
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('condition')
                            ->options([
                                0 => 'Used',
                                1 => 'New',
                            ])
                            ->native(false)
                            ->required()
                            ->label('Condition'),
                        Forms\Components\Toggle::make('is_anonymous')
                            ->label('Post as Anonymous'),
                        Forms\Components\Select::make('volunteer_id')
                            ->label('Select a Volunteer')
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->options(function ($record) {
                                return User::where('role', 'volunteer')->pluck('name', 'id')->toArray();
                            }),
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
                Tables\Columns\TextColumn::make('slug')->searchable()->sortable()->limit(20),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('category.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable()
                    ->tooltip(fn($record) => $record->status ? 'Active' : 'Pending Approval')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->status ? 'Approved' : 'Pending')
                    ->color(fn($record) => $record->status ? 'success' : 'warning'),
                Tables\Columns\TextColumn::make('volunteer.name')->searchable()->sortable()
                    ->label('Agent'),
            ])
            ->filters([
                //
            ])
            ->actions([
                //  Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            RelationManagers\AppliedItemsRelationManager::class,
            RelationManagers\ApplicantsFromOrganizationRelationManager::class,
        ];
    }
    public static function getWidgets(): array
    {
        return [
            TotalDonations::class,
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
