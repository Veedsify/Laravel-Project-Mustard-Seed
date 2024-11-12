<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CampaignCategoryResource\Pages;
use App\Filament\Admin\Resources\CampaignCategoryResource\RelationManagers;
use App\Models\CampaignCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CampaignCategoryResource extends Resource
{
    protected static ?string $model = CampaignCategory::class;
    protected static ?string $navigationGroup = 'Campaigns & Donations';
    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Campaign Category Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('name')->label('Name')->placeholder('Name of the campaign category')->required()->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255)->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')->label('Description')->placeholder('Description of the campaign category')->required()->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')->label('Image')->required()->columnSpanFull(),
                        Forms\Components\Select::make('status')->label('Status')->options([
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'completed' => 'Completed',
                        ])->required(),

                    ]),
                ])->columnSpan(2),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug'),    
                Tables\Columns\TextColumn::make('description')->searchable()->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('status')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListCampaignCategories::route('/'),
            'create' => Pages\CreateCampaignCategory::route('/create'),
            'edit' => Pages\EditCampaignCategory::route('/{record}/edit'),
        ];
    }
}
