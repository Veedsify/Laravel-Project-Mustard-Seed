<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BlogResource\Pages;
use App\Models\Blog;
use App\Policies\BlogPolicy;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    public static $policy = BlogPolicy::class;


    protected static ?string $navigationGroup = 'Blogs';
    protected static ?string $navigationIcon = 'heroicon-s-book-open';
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
                        Forms\Components\TextInput::make('slug')->readOnly()->columnSpan('full')->unique(column: 'slug')->label('Slug')->required(),
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
            ])->columns(5);;
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->modifyQueryUsing(function (Builder $query) {
            //     $query->where('user_id', auth()->user()->id);
            // })
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->icon('heroicon-o-eye')
                    ->label('View Post')
                    ->url(fn($record) => route('blog.details', $record->slug))
                    ->extraAttributes([
                        'target' => '_blank',
                    ])
                // DeleteAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
