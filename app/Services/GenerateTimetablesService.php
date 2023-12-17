<?php

namespace App\Services;

use App\Models\Lesson;
use App\Models\Semester;
use App\Models\Timetable;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class GenerateTimetablesService
{
    public function run(): void
    {
        try {
            DB::beginTransaction();

            $lessons = Lesson::all();

            $lessonsPerDay = [];
            foreach ($lessons as $lesson) {
                $lessonsPerDay[$lesson->day_of_week_id][] = $lesson;
            }

            $semester = Semester::query()
                ->where('studying_end_date', '>=', Carbon::now())
                ->first();

            for (
                /* @var Carbon $date */
                $date = Carbon::make($semester->studying_start_date);
                $date <= $semester->studying_end_date;
                $date->addDay()
            ) {
                /* @var Lesson $lesson*/
                foreach ($lessonsPerDay[$date->dayOfWeekIso] ?? [] as $lesson) {
                    Timetable::query()->firstOrCreate([
                        'semester_id' => $semester->id,
                        'start_at' => $date->setTimeFromTimeString($lesson->time_from),
                        'end_at' => $date->setTimeFromTimeString($lesson->time_to),
                        'order' => $lesson->order,
                        'is_numerator' => $lesson->is_numerator,
                        'day_of_week_id' => $lesson->day_of_week_id,
                        'room_id' => $lesson->room_id,
                        'group_id' => $lesson->group_id,
                        'subgroup_id' => $lesson->subgroup_id,
                        'type_of_lesson_id' => $lesson->type_of_lesson_id,
                        'teacher_id' => $lesson->teacher_id,
                        'course_id' => $lesson->course_id
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            Notification::make()
                ->title($e->getMessage())
                ->body($e->getCode())
                ->danger()
                ->send();
            DB::rollBack();
        }
    }
}
