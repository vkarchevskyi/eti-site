<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Timetable;
use App\Services\GetTimetableService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function show(Request $request, GetTimetableService $getTimetableService)
    {
        /* @var Group $group */
        $group = Group::query()->find($request->get('group_id'));

        return $getTimetableService
            ->run($group->id, $request->get('subgroup_id'))
            ->groupBy(fn(Timetable $lesson) => Carbon::make($lesson->start_at)->format('Y-m-d'))
            ->map(fn(Collection $lesson) => $lesson->map(fn(Timetable $lesson) => [
                'order' => $lesson->order,
                'room_name' => $lesson->room->name,
                'room_type' => $lesson->room->roomType->name,
                'course_name' => $lesson->course->name,
                'type_of_lesson' => $lesson->typeOfLesson->name,
                'teacher' => [
                    'first_name' => $lesson->teacher->first_name,
                    'second_name' => $lesson->teacher->second_name,
                    'middle_name' => $lesson->teacher->middle_name,
                ],
                'start_at' => $lesson->start_at,
                'end_at' => $lesson->end_at,
            ]));
    }
}
