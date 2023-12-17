<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Timetable;
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

    protected static ?string $modelLabel = 'Пару';
    protected static ?string $pluralLabel = 'Пари';

    public const TIMES_FROM = [
        '08:30',
        '10:10',
        '12:10',
        '13:50',
        '15:30',
    ];

    public const TIMES_TO = [
        '10:00',
        '11:40',
        '13:40',
        '15:20',
        '17:00',
        '11:30'
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...self::getLessonFormWithoutTime(),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Select::make('time_from')
                            ->options(array_combine(self::TIMES_FROM, self::TIMES_FROM))
                            ->placeholder('Обрати час')
                            ->label('Час початку заняття'),
                        Forms\Components\Select::make('time_to')
                            ->options(array_combine(self::TIMES_TO, self::TIMES_TO))
                            ->placeholder('Обрати час')
                            ->label('Час кінця заняття'),
                    ])
                    ->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ...self::getLessonsTableWithoutTime(),
                Tables\Columns\TextColumn::make('time_from')
                    ->label('Початок'),
                Tables\Columns\TextColumn::make('time_to')
                    ->label('Кінець'),
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

    public static function getLessonFormWithoutTime(): array
    {
        return [
            Forms\Components\Select::make('group_id')
                ->label('Група')
                ->relationship('group', 'name')
                ->live()
                ->afterStateUpdated(function (Forms\Components\Select $component): void {
                    $component
                        ->getContainer()
                        ->getComponent('subgroup_id')
                        ->fill();
                })
                ->required(),
            Forms\Components\Select::make('subgroup_id')
                ->label('Підгрупа')
                ->placeholder('Для усієї групи')
                ->key('subgroup_id')
                ->options(function (Forms\Get $get, Forms\Components\Select $component) {
                    if ($subgroups = Group::with('subgroups')->find($get('group_id'))?->subgroups) {
                        $component->disabled(false);
                        return $subgroups->pluck('subgroup_value', 'id');
                    } else {
                        $component->disabled();
                        return [];
                    }
                }),
            Forms\Components\Select::make('is_numerator')
                ->label('Чисельник чи знаменник?')
                ->placeholder('Обидва варіанти')
                ->options([1 => 'Чисельник', 0 => 'Знаменник']),
            Forms\Components\Select::make('type_of_lesson_id')
                ->label('Тип заняття')
                ->relationship('typeOfLesson', 'name')
                ->required(),
            Forms\Components\Select::make('teacher_id')
                ->label('Викладач')
                ->relationship('teacher')
                ->getOptionLabelFromRecordUsing(
                    fn(Teacher $record) => "{$record->second_name} {$record->first_name}"
                )
                ->required(),
            Forms\Components\Select::make('course_id')
                ->label('Дисципліна')
                ->relationship('course', 'name'),
            Forms\Components\Select::make('day_of_week_id')
                ->label('День тижня')
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
            Forms\Components\Select::make('order')
                ->label('Номер пари')
                ->options([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5])
                ->required()
                ->live()
                ->afterStateUpdated(function ($state, Forms\Set $set) {
                    if ($state) {
                        $set('time_from', self::TIMES_FROM[$state - 1]);
                        $set('time_to', self::TIMES_TO[$state - 1]);
                    }
                }),
            Forms\Components\Select::make('room_id')
                ->label('Кабінет')
                ->relationship('room', 'name'),
        ];
    }

    public static function getLessonsTableWithoutTime(): array
    {
        return [
            Tables\Columns\TextColumn::make('group.name')
                ->label('Група'),
            Tables\Columns\TextColumn::make('teacher')
                ->formatStateUsing(
                    fn(Lesson|Timetable $record) => "{$record->teacher->first_name} {$record->teacher->second_name}"
                ),
            Tables\Columns\TextColumn::make('room.name')
                ->label('Номер кабінету'),
            Tables\Columns\SelectColumn::make('is_numerator')
                ->disabled()
                ->options([
                    null => 'Чисельник і знаменник',
                    0 => 'Знаменник',
                    1 => 'Чисельник'
                ])
                ->label('Розташування'),
        ];
    }
}
