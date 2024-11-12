<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CommentResource\Pages;
use App\Filament\User\Resources\CommentResource\RelationManagers;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-bottom-center-text';
    protected static ?string $modelLabel = 'Comments';
    protected static string | array $routeMiddleware = [CheckUserIsIdVerified::class];
    protected static ?string $navigationGroup = 'Blogs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Comment Information')->columns(1)->schema([
                    Forms\Components\Textarea::make('content')
                        ->label('Content')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),
                    Forms\Components\Checkbox::make('approved')
                        ->label('Approved')
                        ->extraAttributes([
                            'checked' => true,
                        ])
                        ->columnSpan(1)
                        ->visible(fn() => false),

                    Forms\Components\TextInput::make('user_id')
                        ->label('User')
                        ->required()
                        ->default(auth()->user()->id)
                        ->readOnly()
                        ->columnSpan(1),
                    Forms\Components\Select::make('blog_id')
                        ->label('Blog')
                        ->options(fn() => Blog::all()->pluck('title', 'id')->toArray())
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('approved')
                    ->label('Approved')
                    ->disabled()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('blog.title')
                    ->label('Blog')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->sortable()
                    ->date('Y-m-d H:i:A'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ViewAction::make('view')
                    ->label('View')
                    ->icon('heroicon-s-eye'),
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
            RelationManagers\BlogRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
