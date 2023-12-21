<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Subgroup;
use App\Models\Timetable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class MainPage extends Component
{
    public Collection $groups;

    public ?Group $activeGroup;
    public ?Subgroup $activeSubgroup;

    public function mount()
    {
        $this->groups = Group::with('subgroups')->get();
        $this->activeGroup = $this->groups->firstOrFail();

        $this->setActiveSubgroup();
    }

    public function render()
    {
        /* @var Collection $timetables */
        $timetables = Timetable::with(['group', 'teacher', 'typeOfLesson', 'course', 'subgroup', 'room'])
            ->where('group_id', '=', $this->activeGroup->id)
            ->where('start_at', '>', now())
            ->where('end_at', '<', now()->addDays(7))
            ->where(function (Builder $query) {
                $query->where('subgroup_id', '=', $this->activeSubgroup?->id)
                    ->orWhereNull('subgroup_id');
            })
            ->orderBy('start_at')
            ->get();

        return view('livewire.main-page', [
            'lessons' => $timetables->groupBy('day_of_week_id'),
            'subgroups' => $this->activeGroup->subgroups ?? [],
        ]);
    }

    public function updateGroup(mixed $id): void
    {
        $id = intval($id);

        $this->activeGroup = $this->groups->firstWhere('id', $id);
        $this->setActiveSubgroup();
    }

    public function updateSubgroup(mixed $id): void
    {
        $id = intval($id);

        $this->activeSubgroup = $this->activeGroup->subgroups->firstWhere('id', $id);
    }

    protected function setActiveSubgroup(): void
    {
        if ($this->activeGroup->subgroups->count()) {
            $this->activeSubgroup = $this->activeGroup->subgroups->first();
        }
    }
}
