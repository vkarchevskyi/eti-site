<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Новина';
    protected static ?string $pluralLabel = 'Новини';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Заголовок')
                    ->live(true)
                    ->afterStateUpdated(fn(
                        Set $set,
                        ?string $state
                    ) => $set('slug', Str::slug(Str::transliterate($state ?? ''))))
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->label('Посилання'),
                Forms\Components\TextInput::make('short_description')
                    ->columnSpanFull()
                    ->label('Короткий опис'),
                Forms\Components\FileUpload::make('preview_image_path')
                    ->label('Превь\'ю')
                    ->disk('public')
                    ->directory('news'),
                TiptapEditor::make('content')
                    ->label('Контент')
                    ->profile('default')
                    ->disk('public')
                    ->directory('news')
                    ->maxContentWidth('5xl')
                    ->columnSpanFull()
                    ->output(TiptapOutput::Html)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('short_description'),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
