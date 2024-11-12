<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CampaignResource\Pages;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\Campaign;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CampaignResource extends Resource
{
    protected static string|array $routeMiddleware = [CheckUserIsIdVerified::class];

    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';

    protected static ?string $navigationLabel = 'All Campaigns';

    protected static ?string $navigationGroup = 'Campaigns';

    protected static ?string $breadcrumb = 'Campaigns';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\Campaign::route('/'),
            //            'index' => Pages\ListCampaigns::route('/'),
//            'create' => Pages\CreateCampaign::route('/create'),
//            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
