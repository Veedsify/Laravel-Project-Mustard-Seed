<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use App\Models\State;
use App\Models\User;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static  ?string $modelLabel = 'Users';

    protected  static ?string $navigationGroup = 'Users';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Section::make('User Information')->columns(2)->schema([
                        Forms\Components\TextInput::make('name')->label('Name')->required(),
                        Forms\Components\TextInput::make('email')->label('Email')->required(),
                        Forms\Components\TextInput::make('username')->label('Username'),
                    ]),
                    Section::make('User Configs')->columns(2)->schema([
                        Forms\Components\FileUpload::make('avatar')->label('Avatar'),
                        Forms\Components\FileUpload::make('cover')->label('Cover'),
                        Forms\Components\RichEditor::make('bio')->label('Bio')->columnSpanFull(),
                        Forms\Components\TextInput::make('google_id')->label('Google Id'),
                    ]),
                ])->columnSpan(2),
                Forms\Components\Group::make([
                    Section::make('User Relations')->schema([
                        Forms\Components\Select::make('location')
                            ->options(
                                State::all()
                                    ->pluck('name', 'id')
                            )
                            ->native(false)
                            ->label('Location'),
                        Forms\Components\Select::make('roles')
                            ->label('Roles')
                            ->relationship('roles', 'name') // This is where you define the pivot relationship
                            ->preload() // Preload roles for better UX
                            ->searchable(),
                        Toggle::make('admin_approved')->label('Admin Approved')->hidden(fn($record) => Auth::user()->id == $record->id),

                    ])
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::class::make('name')->sortable()->searchable(),
                TextColumn::class::make('role')->sortable(),
                TextColumn::class::make('email')->sortable(),
                TextColumn::class::make('admin_approved')->getStateUsing((
                    fn($record) => $record->admin_approved ? 'Approved' : 'Not Approved'
                ))->label('Admin Approved')
                    ->badge()
                    ->color(
                        fn($record) => $record->admin_approved ? 'success' : 'danger'
                    ),
                ImageColumn::class::make('avatar')
            ])
            ->filters([
                Filter::class::make("name")
            ])
            ->actions([
                ViewAction::make(),
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
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
            RelationManagers\BlogsRelationManager::class,
            RelationManagers\CommentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
