<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Semester;
use App\Models\Subgroup;
use App\Models\Timetable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
        $semester = Semester::query()
            ->where('studying_end_date', '>=', Carbon::now())
            ->first();

        $firstWeek = Carbon::make($semester->studying_start_date)->weekOfYear;

        $now = Carbon::now();
        $endAt = Carbon::make($now)->addDays(7);
        $endOfWeek = Carbon::make($now);
        while (!$endOfWeek->isSunday()) {
            $endOfWeek->addDay();
        }

        /* @var Collection $timetables */
        $timetables = Timetable::with(['group', 'teacher', 'typeOfLesson', 'course', 'subgroup', 'room'])
            ->where('group_id', '=', $this->activeGroup->id)
            ->where('start_at', '>', $now)
            ->where(function (Builder $query) {
                $query->where('subgroup_id', '=', $this->activeSubgroup?->id)
                    ->orWhereNull('subgroup_id');
            })
            ->where(function (Builder $query) use ($endOfWeek, $endAt, $firstWeek) {
                $query
                    ->where(function (Builder $query) use ($endOfWeek, $firstWeek) {
                        $query->where('end_at', '<=', $endOfWeek)
                            ->where(function (Builder $query) use ($firstWeek, $endOfWeek) {
                                $query->where('is_numerator', '=', !(($endOfWeek->weekOfYear - $firstWeek) % 2))
                                    ->orWhereNull('is_numerator');
                            });
                    })
                    ->orWhere(function (Builder $query) use ($endOfWeek, $endAt, $firstWeek) {
                        $query->where('start_at', '>=', $endOfWeek)
                            ->where('end_at', '<', $endAt)
                            ->where(function (Builder $query) use ($firstWeek, $endAt) {
                                $query->where('is_numerator', '=', !(($endAt->weekOfYear - $firstWeek) % 2))
                                    ->orWhereNull('is_numerator');
                            });
                    });
            })
            ->orderBy('start_at')
            ->get();

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
