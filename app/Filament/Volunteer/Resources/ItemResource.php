<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\ItemResource\Pages;
use App\Filament\Volunteer\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use App\Models\ItemCategory;
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
    protected static ?string $navigationGroup = 'Campaigns';
    protected static ?string $navigationLabel = 'Approve Donations';
    protected static ?string $title = 'New Donation';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section that spans 2 columns
                Section::make('Main Details')
                    ->columnSpan(1)
                    ->description('Please only approve donations, within your poccession that are in good condition.')
                    ->schema([
                        Forms\Components\Select::make('status')->label('Status')->required()->options([
                            0 => 'Pending',
                            1 => 'Approved',
                        ])->native(false)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('volunteer_id', Auth::user()->id);
            })
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('unit'),
                Tables\Columns\TextColumn::make('status')
                    ->icon(fn($record) => $record->status ? 'heroicon-s-check-circle' : 'heroicon-s-x-circle')
                    ->iconColor(fn($record) => $record->status ? 'success' : 'warning'),
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
