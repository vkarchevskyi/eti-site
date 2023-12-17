<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetableResource\Pages;
use App\Models\Timetable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Пару';

    protected static ?string $pluralLabel = 'Розклад';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...LessonResource::getLessonFormWithoutTime(),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\DateTimePicker::make('start_at')
                            ->label('Час початку заняття'),
                        Forms\Components\DateTimePicker::make('end_at')
                            ->label('Час кінця заняття'),
                    ])
                    ->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ...LessonResource::getLessonsTableWithoutTime(),
                Tables\Columns\TextColumn::make('start_at')
                    ->label('Початок пари'),
                Tables\Columns\TextColumn::make('end_at')
                    ->label('Кінець пари'),
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
            'index' => Pages\ListTimetables::route('/'),
            'create' => Pages\CreateTimetable::route('/create'),
            'edit' => Pages\EditTimetable::route('/{record}/edit'),
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
