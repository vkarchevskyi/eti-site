<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SemesterResource\Pages;
use App\Models\Semester;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SemesterResource extends Resource
{
    protected static ?string $model = Semester::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Семестр';
    protected static ?string $pluralLabel = 'Семестри';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label("Ім'я")
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(1024),
                Forms\Components\DatePicker::make('studying_start_date')
                    ->required()
                    ->label('Початок навчання'),
                Forms\Components\DatePicker::make('studying_end_date')
                    ->required()
                    ->label('Кінець навчання'),
                Forms\Components\DatePicker::make('exam_start_date')
                    ->label('Початок екзаменів'),
                Forms\Components\DatePicker::make('exam_end_date')
                    ->label('Кінець екзаменів'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label("Ім'я"),
                Tables\Columns\TextColumn::make('studying_start_date')
                    ->label('Початок навчання'),
                Tables\Columns\TextColumn::make('studying_end_date')
                    ->label('Кінець навчання'),
                Tables\Columns\TextColumn::make('exam_start_date')
                    ->label('Початок екзаменів'),
                Tables\Columns\TextColumn::make('exam_end_date')
                    ->label('Кінець екзаменів'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListSemesters::route('/'),
            'create' => Pages\CreateSemester::route('/create'),
            'edit' => Pages\EditSemester::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
