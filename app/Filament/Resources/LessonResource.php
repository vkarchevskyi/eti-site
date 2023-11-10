<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('group_id')
                    ->relationship('group', 'name')
                    ->reactive()
//                            ->afterStateUpdated(function ($state, callable $set) {
//                                dd($state);
//                            })
                    ->required(),
                Forms\Components\Select::make('subgroup_id')
//                            ->options([])
                    ->multiple()
                    ->relationship('group.subgroup', 'group.subgroup.subgroup_value')
                    ->required(),

                Forms\Components\Select::make('is_numerator')
                    ->options([1 => 'Чисельник', 0 => 'Знаменник']),
                Forms\Components\Select::make('type_of_lesson_id')
                    ->relationship('type_of_lessons', 'name')
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->relationship('teachers', 'name')
                    ->required(),
                Forms\Components\Select::make('course_id')
                    ->relationship('courses', 'name'),
                Forms\Components\Select::make('day_of_week_id')
                    ->options([
                        1 => 'Понеділок',
                        2 => 'Вівторок',
                        3 => 'Середа',
                        4 => 'Четвер',
                        5 => 'П\'ятниця',
                        6 => 'Субота',
                        7 => 'Неділя'
                    ])
                    ->required(),
                Forms\Components\TimePicker::make('time_from'),
                Forms\Components\TimePicker::make('time_to'),
                Forms\Components\Select::make('order')
                    ->options([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
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
