<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BlogResource\Pages;
use App\Filament\Admin\Resources\BlogResource\RelationManagers\CommentsRelationManager;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationGroup = 'Blogs';
    protected static ?string $navigationIcon = 'heroicon-s-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Create a Blog')->schema([
                        Forms\Components\TextInput::make('title')->label('Title')->required()->live(onBlur: true)->columnSpan('full')
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')->readOnly()->columnSpan('full')->unique(
                            'blogs',
                            'slug',
                            ignoreRecord: true
                        )->label('Slug')->required(),
                        Forms\Components\RichEditor::make('content')->label('Editor')->required()->columnSpan('full'),
                    ])->description("Create a new blog post.")->columns(2),
                ])->columnSpan(3),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Image')->schema([
                        Forms\Components\FileUpload::make('image')->label('Image')->required()->maxSize(function () {
                            return 1024 * 1024 * 2; // 2MB
                        })->acceptedFileTypes(function () {
                            return ['image/*'];
                        }),
                    ])->description("add a post image"),
                    Section::make('Category')->schema([
                        Forms\Components\Select::make('category_id')->label('Category')->options(function () {
                            return \App\Models\Category::pluck('name', 'id');
                        })->required()->columnSpan('full')->searchable()
                    ])->description('add post category')
                ])->columnSpan(2)
            ])->columns(5);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make("image")->sortable(),
                Tables\Columns\TextColumn::make("title")->sortable()->searchable(),
                Tables\Columns\TextColumn::make("slug")->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
