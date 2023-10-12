<?php

declare(strict_types=1);

namespace App\Actions\Lessons;

use App\Models\Lesson;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CreateLesson
{
    public function execute(Request $request): void
    {
        try {
            Lesson::query()->create([
                'group_id' => $request->request->get('groupId'),
                'order' => $request->request->get('order'),
                'subgroup_id' => $request->request->get('subgroupId'),
                'is_numerator' => $request->request->get('isNumerator'),
                'type_of_lesson_id' => $request->request->get('typeOfLessonId'),
                'teacher_id' => $request->request->get('teacherId'),
                'course_id' => $request->request->get('courseId'),
                'day_of_week_id' => $request->request->get('dayOfWeekId'),
                'time_from' => $request->request->get('timeFrom'),
                'time_to' => $request->request->get('timeTo'),
            ]);
        } catch (QueryException $exception) {
        }
    }
}
