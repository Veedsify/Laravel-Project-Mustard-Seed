<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\MyJobApplicationResource\Pages;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\MyJobApplication;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MyJobApplicationResource extends Resource
{
    protected static ?string $model = MyJobApplication::class;

    protected static ?string $navigationIcon = 'heroicon-s-book-open';
    protected static string | array $routeMiddleware = [CheckUserIsIdVerified::class];
    protected static ?string $navigationGroup = 'Jobs';
    public static function canEdit($record): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Job Application details')->schema([
                    Forms\Components\TextInput::make('name')
                        ->disabled()
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->disabled()
                        ->required(),
                    Forms\Components\TextInput::make('phone')
                        ->disabled()
                        ->required(),
                    Forms\Components\Textarea::make('cover_letter')
                        ->disabled()
                        ->required(),
                    Forms\Components\FileUpload::make('resume')
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->where('user_id', auth()->id());
            })
            ->columns([
                Tables\Columns\ImageColumn::make('job.image1')->label('Image'),
                Tables\Columns\TextColumn::make('job.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cover_letter')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('approved')->boolean()->label('Approved'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMyJobApplications::route('/'),
            'create' => Pages\CreateMyJobApplication::route('/create'),
            'edit' => Pages\EditMyJobApplication::route('/{record}/edit'),
        ];
    }
}
