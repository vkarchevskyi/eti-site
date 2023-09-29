<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateLesson;
use App\Actions\GetGroupLessons;
use App\Actions\GetLessons;
use App\Models\Course;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Subgroup;
use App\Models\Teacher;
use App\Models\TypeOfLesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class LessonsController extends Controller
{
    public function create(): View
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $types = TypeOfLesson::all();
        $groups = Group::all();
        $subgroups = Subgroup::all();

        return view('lessons.create', compact(
            'courses',
            'teachers',
            'types',
            'groups',
            'subgroups',
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        app(CreateLesson::class)->execute($request);
        return redirect('lessons.create');
    }

    public function index(Request $request)
    {
        $groupId = $request->get('groupId') ?? 1;
//        $subgroupId = $request->get('subgroupId') ?? 1;

        $groups = Group::with('subgroup')->get();
        $group = $groups->find($groupId);

        $weeklyTimetable = $this->getListOfTimetable($group);

        return view('lessons.index', compact('groups', 'group', /*'subgroupId',*/ 'weeklyTimetable'));
    }

    public function showByGroup(Request $request)
    {
        $groupId = intval($request->get('groupId')) ?? 1;
        $subgroupId = intval($request->get('subgroupId')) ?? 1;

        $groups = Group::with('subgroup')->get();
        $group = $groups->find($groupId);

        $weeklyTimetable = $this->getListOfTimetable($group);

        // полные костыли

        // плюс нужно доделать знаменник

        $length = $weeklyTimetable->count();
        for ($i = 0; $i < $length; $i++) {
            $weeklyTimetable[$i] = $weeklyTimetable[$i]->map(function (Collection $collection) use ($subgroupId) {
                return $collection->filter(function (Lesson $lesson) use ($subgroupId) {
                    return $lesson->subgroup === null || $lesson->subgroup->id === $subgroupId;
                });
            });
        }

//        dd($weeklyTimetable);


        return view('lessons.index-group', compact('groups', 'group', 'subgroupId', 'weeklyTimetable'));
    }

    private function getListOfTimetable(Group $group)
    {
        $timetable = collect();
        $lessons = app(GetGroupLessons::class)->execute($group->id);
        for ($i = 1; $i <= 7; $i++) {
            $dayLessons = $lessons->where('day_of_week_id', $i);
            $groupedLessons = collect();
            for ($j = 1; $j <= 5; $j++) {
                $sortedLessons = $dayLessons->where('order', $j)->sort(function (Lesson $lesson) {
                    return $lesson->subgroup?->subgroup_value;
                });
                $groupedLessons->add(collect([
                    'week_division' => boolval($sortedLessons->filter(function ($lesson) {
                        return is_int($lesson->is_numerator);
                    })->count()),
                    'lessons' => $sortedLessons,
                ]));
            }
            $timetable->add($groupedLessons);
        }

        return $timetable;
    }
}
