<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DonationResource\Pages;
use App\Filament\Admin\Resources\DonationResource\RelationManagers;
use App\Models\Campaign;
use App\Models\Donation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;
    protected static ?string $navigationGroup = 'Campaigns & Donations';

    protected static ?string $navigationIcon = 'heroicon-s-chart-pie';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Donation Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('amount')
                            ->label('Amount')
                            ->placeholder('Amount to be donated')
                            ->required()
                            ->columnSpanFull()
                            ->afterStateUpdated(function (string $operation) {
                                if ($operation === 'create') {
                                    Campaign::where('id', request()->campaign_id)->increment('amount', request()->amount);
                                }
                            }),
                        Forms\Components\Select::make('payment_method')->label('Payment Method')->options([
                            'credit_card' => 'Credit Card',
                            'paypal' => 'PayPal',
                        ])->required(),
                        Forms\Components\Select::make('status')->label('Status')->options([
                            'pending' => 'Pending',
                            'completed' => 'Completed',
                            'failed' => 'Failed',
                        ])->required(),
                    ]),
                    Forms\Components\Section::make('Link to a Campaign')->columns(3)->schema([
                        Forms\Components\Select::make('campaign_id')
                            ->label('Campaign')
                            ->live()
                            ->options(function () {
                                return \App\Models\Campaign::pluck('name', 'id');
                            })
                            ->afterStateUpdated(function (Forms\Set $set, $state, string $operation, Model $model, Forms\Get $get) {
                                $campaign = Campaign::find($state);
                                if ($campaign) {
                                    $set('amount', $campaign->goal);
                                }
//                                if ($operation === 'create') {
//                                    Campaign::where('id', $state)->increment('raised', intval($get('amount')));
//                                }
                            })
                            ->required()
                            ->columnSpanFull()
                            ->searchable()
                    ]),
                ])->columnSpan(2),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Assign to a User')->columns(3)->schema([
                        Forms\Components\Select::make('user_id')->label('User')->options(function () {
                            return \App\Models\User::pluck('name', 'id');
                        })->required()->columnSpanFull()->searchable()
                    ]),
                    Forms\Components\Section::make('Payment Reference')->columns(3)->schema([
                        Forms\Components\TextInput::make('payment_id')->label('Payment Ref')->placeholder('Payment Reference')->required()->columnSpanFull(),
                        Forms\Components\Select::make('payment_status')->label('Status')->options([
                            'pending' => 'Pending',
                            'completed' => 'Completed',
                            'failed' => 'Failed',
                        ])->columnSpanFull()->searchable()
                    ]),
                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('payment_method')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('payment_id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('payment_status')->searchable()->sortable(),
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
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
