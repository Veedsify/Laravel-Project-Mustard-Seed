<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ServiceeResource\Pages;
use App\Filament\Admin\Resources\ServiceeResource\RelationManagers;
use App\Models\Service;
use App\Models\Servicee;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ServiceeResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationGroup = 'Services';

    protected static ?string $navigationIcon = 'heroicon-s-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Service Information')->columns(3)->schema([
                        Forms\Components\TextInput::make('service_name')->label('Name')->placeholder('Name of the service')->required()->columnSpanFull()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('service_slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('service_slug')
                            ->label('Slug')
                            ->required()
                            ->readOnly()
                            ->maxLength(255)->columnSpanFull(),
                        Forms\Components\Textarea::make('service_description')->label('Description')->placeholder('Description of the service')->required()->columnSpanFull(),
                        Forms\Components\RichEditor::make('service_content')->label('Content')->placeholder('Content of the service')->required()->columnSpanFull(),
                        Forms\Components\Toggle::make('service_status')->label('Status')->required(),

                    ]),
                ])->columnSpan(2),
                Section::make('Service Image')->schema([
                    Forms\Components\FileUpload::make('service_image')->label('Image')->required(),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('service_image')->searchable()->sortable(),
                TextColumn::make('service_name')->searchable()->sortable(),
                TextColumn::make('service_description')->searchable()->sortable()->limit(60),
                TextColumn::make('service_slug')->searchable()->sortable(),
                TextColumn::make('service_status')
                    ->searchable()
                    ->sortable()
                    ->getStateUsing(fn($record) =>  $record->service_status ? 'Active' : 'Inactive')
                    ->badge()
                    ->color(fn($record) => $record->service_status ? 'success' : 'danger')
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
            'index' => Pages\ListServicees::route('/'),
            'create' => Pages\CreateServicee::route('/create'),
            'edit' => Pages\EditServicee::route('/{record}/edit'),
        ];
    }
}
