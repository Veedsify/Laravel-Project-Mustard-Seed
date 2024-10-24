<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HomepageDataResource\Pages;
use App\Models\HomepageData;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HomepageDataResource extends Resource
{
    protected static ?string $model = HomepageData::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'Configs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Banner Information Section')
                        ->description('This section is for the banner information.')
                        ->schema([
                            Forms\Components\FileUpload::make('logo')
                                ->label('Logo')
                                ->avatar()
                                ->required(),
                            Forms\Components\TextInput::make('home_banner_intro')
                                ->label('Home Banner Intro')
                                ->required(),
                            Forms\Components\TextInput::make('home_banner_title')
                                ->label('Home Banner Title')
                                ->required(),
                            Forms\Components\Textarea::make('home_banner_description')
                                ->label('Home Banner Description')
                                ->required(),
                            Forms\Components\FileUpload::make('home_banner_image')
                                ->label('Home Banner Image')
                                ->required(),
                                Forms\Components\Textarea::make('footer_text')
                                ->label('Footer Text')
                                ->required(),
                        ]),
                ])->columnSpan(3),
                Group::make()->schema([
                    Section::make('Banner Experience Section')
                        ->schema([
                            Forms\Components\Toggle::make('show_banner_experience')
                                ->label('Show Banner Experience')
                                ->required(),
                            Forms\Components\TextInput::make('banner_experience_title_1')
                                ->label('Banner Experience Title 1')
                                ->required(),
                            Forms\Components\Textarea::make('banner_experience_desc_1')
                                ->label('Banner Experience Description 1')
                                ->required(),
                            Forms\Components\TextInput::make('banner_experience_title_2')
                                ->label('Banner Experience Title 2')
                                ->required(),
                            Forms\Components\Textarea::make('banner_experience_desc_2')
                                ->label('Banner Experience Description 2')
                                ->required(),
                            Forms\Components\TextInput::make('banner_experience_title_3')
                                ->label('Banner Experience Title 3')
                                ->required(),
                            Forms\Components\Textarea::make('banner_experience_desc_3')
                                ->label('Banner Experience Description 3')
                                ->required(),
                        ]),

                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Show Sections')
                        ->schema([
                            Forms\Components\Toggle::make('show_feature_section')
                                ->label('Show Feature Section')
                                ->required(),
                            Forms\Components\Toggle::make('show_event_section')
                                ->label('Show Event Section')
                                ->required(),
                            Forms\Components\Toggle::make('show_upcoming_event_section')
                                ->label('Show Upcoming Event Section')
                                ->required(),
                            Forms\Components\Toggle::make('show_blog_section')
                                ->label('Show Blog Section')
                                ->required(),
                            Forms\Components\Toggle::make('show_testimonial_section')
                                ->label('Show Testimonial Section')
                                ->required(),
                            Forms\Components\Toggle::make('show_faq_section')
                                ->label('Show FAQ Section')
                                ->required(),
                            Forms\Components\Toggle::make('show_gallery_section')
                                ->label('Show Gallery Section')
                                ->required(),
                        ]),
                ])->columnSpan(5),
            ])->columns(5);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('home_banner_intro')
                    ->searchable()
                    ->label('Home Banner Intro'),
                Tables\Columns\TextColumn::make('home_banner_title')
                    ->searchable()
                    ->label('Home Banner Title'),
                Tables\Columns\TextColumn::make('home_banner_description')
                    ->searchable()
                    ->limit(20)
                    ->label('Home Banner Description'),
                Tables\Columns\ImageColumn::make('home_banner_image')
                    ->label('Home Banner Image'),
                Tables\Columns\ToggleColumn::make('show_banner_experience')
                    ->searchable()
                    ->label('Show Banner Experience'),
                Tables\Columns\ToggleColumn::make('banner_experience_title_1')
                    ->searchable()
                    ->label('Banner Experience Title 1'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListHomepageData::route('/'),
            'create' => Pages\CreateHomepageData::route('/create'),
            'edit' => Pages\EditHomepageData::route('/{record}/edit'),
        ];
    }
}
