<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Timetable;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class MainPage extends Component
{
    public Collection $groups;

    public Group $group;

    public function mount()
    {
        $this->groups = Group::with('subgroups')->get();

        if (!($this->group = $this->groups->first())) {
            abort(500);
        }
    }

    public function render()
    {
        /* @var Collection $timetables */
        $timetables = Timetable::with(['group', 'teacher', 'typeOfLesson', 'course', 'subgroup', 'room'])
            ->where('group_id', '=', $this->group->id)
            ->where('start_at', '>', now())
            ->where('end_at', '<', now()->addDays(7))
            ->get();

        return view('livewire.main-page', [
            'lessons' => $timetables->groupBy('day_of_week_id'),
        ]);
    }
}
