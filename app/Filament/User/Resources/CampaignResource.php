<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CampaignResource\Pages;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\Campaign;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class CampaignResource extends Resource
{
    protected static string|array $routeMiddleware = [CheckUserIsIdVerified::class];

    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';

    protected static ?string $navigationLabel = 'All Campaigns';

    protected static ?string $navigationGroup = 'Campaigns';

    protected static ?string $breadcrumb = 'Campaigns';
    protected static ?string $recordTitleAttribute = 'title';

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        return "Campaign";
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'description',
            'image',
            'slug',
            'status',
            'raised',
            'goal',
            'user.name',
            'location.address'
        ];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'User' => $record->user->name,
            'Location' => $record->location->name,
        ];
    }

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
