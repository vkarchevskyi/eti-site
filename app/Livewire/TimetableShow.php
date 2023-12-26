<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Subgroup;
use App\Models\User;
use App\Services\GetTimetableService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Locked;
use Livewire\Component;

class TimetableShow extends Component
{
    #[Locked]
    public Collection $groups;
    #[Locked]
    public bool $setByUser = false;

    public ?Group $activeGroup;
    public ?Subgroup $activeSubgroup;

    public function mount(): void
    {
        $this->groups = Group::with('subgroups')->get();
        /* @var User|null $user */
        $user = auth()->user();

        if (isset($user?->id) && isset($user?->group_id)) {
            $this->activeGroup = $this->groups->firstWhere('id', $user->group_id);
            $this->activeSubgroup = $this->activeGroup->subgroups->firstWhere('id', $user->subgroup_id) ?? null;
            $this->setByUser = true;
        } else {
            $this->activeGroup = $this->groups->firstOrFail();
            $this->setActiveSubgroup();
        }
    }

    public function render()
    {
        /* @var GetTimetableService $getTimetableService */
        $getTimetableService = app(GetTimetableService::class);
        $timetables = $getTimetableService->run($this->activeGroup->id, $this->activeSubgroup?->id ?? null);

        return view('livewire.timetable-show', [
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
