<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\MyJobResource\Pages;
use App\Filament\User\Resources\MyJobResource\RelationManagers;
use App\Http\Middleware\CheckUserIsIdVerified;
use App\Models\MyJob;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MyJobResource extends Resource
{
    protected static ?string $model = MyJob::class;

    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static string | array $routeMiddleware = [CheckUserIsIdVerified::class];
    protected static ?string $navigationGroup = 'Jobs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Job Information')->schema([
                    Group::make([
                        Forms\Components\TextInput::make('name')->label('Title')->required(),
                        Forms\Components\RichEditor::make('description')->label('Description')->required(),
                        Forms\Components\TextInput::make('location')->label('Location')->required(),
                        Select::make('type')->label('Type')->required()->options([
                            'Project' => 'Project',
                            'Professional Service' => 'Professional Service',
                            'Volunteer' => 'Volunteer',
                        ])->native(false),
                        Forms\Components\Select::make('duration')->label('Duration')->required()->options([
                            '1 day' => '1 day',
                            '2 days' => '2 days',
                            '3 days' => '3 days',
                            '4 days' => '4 days',
                            '5 days' => '5 days',
                            '1 week' => '1 week',
                            '2 weeks' => '2 weeks',
                        ])->native(false),
                        Forms\Components\TextInput::make('salary')->label('Salary (₦)')->required(),
                        Forms\Components\TextInput::make('experience')->label('Experience')->required(),
                    ])->columnSpan(2),
                    Group::make()->schema([
                        Forms\Components\FileUpload::make('image1')->label('Main Image')->required(),
                        Forms\Components\FileUpload::make('image2')->label('Image 2'),
                    ])
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', Auth::id());
            })
            ->columns([
                Tables\Columns\ImageColumn::make('image1')->searchable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('location')->searchable(),
                Tables\Columns\TextColumn::make('type')->searchable(),
                Tables\Columns\TextColumn::make('salary')->searchable(),
                Tables\Columns\TextColumn::make('duration')->searchable(),
                Tables\Columns\TextColumn::make('volunteer.name')->label('Volunteer')->searchable(),
                Tables\Columns\IconColumn::make('status')->boolean()->label('Open'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            RelationManagers\JobApplicationRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyJobs::route('/'),
            'create' => Pages\CreateMyJob::route('/create'),
            'edit' => Pages\EditMyJob::route('/{record}/edit'),
        ];
    }
}
