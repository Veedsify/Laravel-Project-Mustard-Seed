<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CampaignResource\Pages;
use App\Filament\User\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';

    protected static ?string $navigationLabel = 'All Campaigns';

    protected static ?string $navigationGroup = 'Campaigns';

    protected static ?string $breadcrumb = 'Campaigns';

//    protected static function booted()
//    {
//        static::creating(function (Campaign $campaign) {
//            $campaign->user_id = auth()->id();
//        });
//    }

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
            'index'=> Pages\Campaign::route('/')
            //            'index' => Pages\ListCampaigns::route('/'),
//            'create' => Pages\CreateCampaign::route('/create'),
//            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
