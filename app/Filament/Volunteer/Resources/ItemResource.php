<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\ItemResource\Pages;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-s-window';
    protected static ?string $navigationGroup = 'Donations';
    protected static ?string $navigationLabel = 'Approve Donations';
    protected static ?string $title = 'New Donation';

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section that spans 2 columns
                Section::make('Item Details')->schema([
                    Forms\Components\TextInput::make('name')->label('Name')->required()->live(onBlur: true)->columnSpan('full')
                        ->afterStateUpdated(function (Forms\Set $set, $state) {
                            $set('slug', \Illuminate\Support\Str::slug($state));
                        })->readOnly(),
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
                Section::make('Actions')
                    ->columnSpan(1)
                    ->description('Please only approve donations, within your poccession that are in good condition.')
                    ->schema([
                        Forms\Components\Toggle::make('status')->label('Status'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('10s')
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('volunteer_id', Auth::user()->id)->orderBy('id', 'desc');
            })
            ->emptyStateHeading('No pending donations found')
            ->emptyStateDescription('It seems like there are no donations here at the moment.')
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('description')->searchable(),
                Tables\Columns\TextColumn::make('quantity')->searchable(),
                Tables\Columns\TextColumn::make('unit')->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->tooltip(fn($record) => $record->status ? 'Active' : 'Pending Approval')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->status ? 'Approved' : 'Pending')
                    ->color(fn($record) => $record->status ? 'success' : 'warning'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Action::make('UpdateStatus')
                    ->icon('heroicon-s-arrow-path')
                    ->label('Update')
                    ->color('info')
                    ->requiresConfirmation()
                    ->form([
                        Toggle::make('status')
                            ->default(fn($record) => $record->status)
                            ->label('Status')
                            ->required(),
                    ])
                    ->action(function (array $data, Item $record): void {
                        $record->update([
                            'status' => $data['status'],
                        ]);
                        $record->save();
                    }),
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
            TextEntry::make('Donator')
                ->default(fn($record) => $record->user->name),
            TextEntry::make('Donator Email')
                ->default(fn($record) => $record->user->email),
            TextEntry::make('Donator Username')
                ->default(fn($record) => $record->user->username),
            TextEntry::make('Item Category')
                ->default(fn($record) => $record->category->name),
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
