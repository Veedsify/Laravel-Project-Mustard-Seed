<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CampaignResource\Pages;
use App\Filament\Admin\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-s-computer-desktop';

    protected static ?string $navigationGroup = 'Campaigns & Donations';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Campaign Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('name')->label('Name')->placeholder('Name of the campaign')->required()->columnSpanFull()
                            ->live(debounce: 500)
                            ->afterStateUpdated(fn(Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')->unique(
                            'campaigns',
                            'slug',
                            ignoreRecord: true
                        )->label('Slug')->required()->columnSpanFull(),
                        Forms\Components\RichEditor::make('description')->label('Description')->placeholder('Description of the campaign')->required()->columnSpanFull(),
                        Forms\Components\TextInput::make('goal')->label('Goal (Price)')->placeholder('Goal amount')->required()->columnSpanFull(),
                        Forms\Components\TextInput::make('amount')->label('Amount (Count)')->placeholder('Goal amount')->required()->columnSpanFull(),
                        Forms\Components\Fieldset::make('Payment Information')
                            ->schema([
                                Forms\Components\Select::make('status')->label('Status')->options([
                                    'draft' => 'Draft',
                                    'published' => 'Published',
                                    'completed' => 'Completed',
                                ])->required(),
                                Forms\Components\Select::make('payment_method')->label('Payment Method')->options([
                                    'cash' => 'Cash',
                                    'physical' => 'Physical',
                                ])->required(),
                                Forms\Components\Select::make('payment_currency')->label('Currency')->options([
                                    'USD' => 'Dollar USD',
                                    'GBP' => 'British GBP',
                                    'NGN' => 'Nigerian NGN',
                                ])->required(),
                            ])
                    ]),
                    Forms\Components\Section::make('Campaign Images')->columns(3)->schema([
                        Forms\Components\FileUpload::make('image')->label('Items Image')->required()->columnSpanFull(),
                    ]),
                ])->columnSpan(2),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Campaign Dates')->columns(3)->schema([
                        Forms\Components\TextInput::make('start_date')->type('date')->label('Start Date')->required()->columnSpanFull()->beforeOrEqual('end_date'),
                        Forms\Components\TextInput::make('end_date')->type('date')->label('End Date')->required()->columnSpanFull(),
                    ]),
                    Forms\Components\Section::make('Campaign Category')->columns(3)->schema([
                        Forms\Components\Select::make('campaign_category_id')->label('Campaign Category')->options(function () {
                            return \App\Models\CampaignCategory::where('status', 'published')->pluck('name', 'id');
                        })->required()->columnSpanFull()->searchable()->preload()->relationship('campaign_category', 'name'),
                        Forms\Components\Checkbox::make('featured')->label('Mark as featured')->default(false)->columnSpanFull(),
                    ]),
                    Forms\Components\Section::make('Location')->columns(3)->schema([
                        Forms\Components\Select::make('location_id')->label('Location')->options(function () {
                            return \App\Models\Location::pluck('name', 'id');
                        })->required()->columnSpanFull()->searchable()->preload()->relationship('location', 'name'),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('goal')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('start_date')->searchable()->sortable()->date('Y-m-d'),
                Tables\Columns\TextColumn::make('end_date')->searchable()->sortable()->date('Y-m-d'),
                Tables\Columns\TextColumn::make('campaign_category.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('location.name')->searchable()->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('status'),
                Tables\Filters\Filter::make('payment_method'),
                Tables\Filters\Filter::make('campaign_category.id'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
