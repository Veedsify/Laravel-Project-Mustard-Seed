<?php

namespace App\Filament\Volunteer\Resources;

use App\Filament\Volunteer\Resources\DonationResource\Pages;
use App\Filament\Volunteer\Resources\DonationResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-s-chart-pie';

    protected static ?string $navigationGroup = 'Donations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('User Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->placeholder('Donator Name')
                            ->required()
                            ->columnSpanFull(),
                            Forms\Components\TextInput::make('email')->label('Email Address')->placeholder('email@gmail.com')->required(),
                            Forms\Components\TextInput::make('company_email')->label('Company Email Address')->placeholder('company@gmail.com')->required(),
                            Forms\Components\TextInput::make('phone')->label('Phone Number')->placeholder('+234 xxx xxx xxxx')->required(),
                            Forms\Components\TextInput::make('address')
                            ->label('Address')
                            ->placeholder('Street Address')
                            ->required()
                            ->columnSpanFull(),
                            Forms\Components\TextInput::make('city')->label('City')->required()->placeholder('Lagos'),
                    ]),
                    Forms\Components\Section::make('Donation Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('amount')
                            ->label('Amount')
                            ->placeholder('Amount to be donated')
                            ->required()
                            ->columnSpanFull(),
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
                                return \App\Models\Campaign::pluck('name', 'id')->toArray();
                            })
                            ->required()
                            ->columnSpanFull()
                            ->searchable()
                    ]),
                ])->columnSpan(2),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Assign to a User')->columns(3)->schema([
                        Forms\Components\Select::make('user_id')->label('User')->options(function () {
                            return \App\Models\User::pluck('name', 'id')->toArray();
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
