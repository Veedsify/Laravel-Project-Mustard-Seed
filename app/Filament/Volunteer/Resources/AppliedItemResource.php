<?php
namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\AppliedItemResource\Pages;
use App\Models\AppliedItem;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AppliedItemResource extends Resource
{
    protected static ?string $model = AppliedItem::class;
    protected static ?string $navigationIcon = 'heroicon-s-cube';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Applied Items';
    protected static ?string $title = 'New Donation';
    public static function canEdit($record): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereHas('item', function ($query) {
                    $query->where('volunteer_id', Auth::user()->id);
                })->orderBy('id', 'desc');
            })
            ->defaultGroup('item.name')
            ->columns([
                Tables\Columns\ImageColumn::make('item.image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('item.name')
                    ->label('Item Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.custom_username')
                    ->label('Username')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reason')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_approved')
                    ->label('Mark As Approved')
                    ->sortable()
                    ->afterStateUpdated(function ($record, $state) {
                        // Runs after the state is saved to the database.
                        function getMessage($state)
            {
                            return "Item Marked As " . ($state ? "Approved" : "Pending");
                        }
                        Notification::make()
                            ->title(getMessage($state))
                            ->success()
                            ->send();
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('Item Name')
                ->default(fn($record) => $record->item->name)
                ->columnSpan(2),
            ImageEntry::make('Image')
                ->default(fn($record) => $record->item->image)
                ->columnSpan(2),
            TextEntry::make('Username')
                ->default(fn($record) => $record->user->custom_username),
            TextEntry::make('Item Category')
                ->default(fn($record) => $record->item->category->name),
            TextEntry::make('Assigned Volunteer Name')
                ->default(fn($record) => $record->item->volunteer->volunteer_settings->organization),
            TextEntry::make('Reason For Applying')
                ->default(fn($record) => $record->reason),
        ])->columns(2);
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
            'index' => Pages\ListAppliedItems::route('/'),
            'create' => Pages\CreateAppliedItem::route('/create'),
            'edit' => Pages\EditAppliedItem::route('/{record}/edit'),
        ];
    }
}
