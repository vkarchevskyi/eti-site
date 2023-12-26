<?php

namespace App\Services;

use App\Models\Semester;
use App\Models\Timetable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GetTimetableService
{
    public function run(int $groupId, ?int $subgroupId): Collection
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

        return Timetable::with(['group', 'teacher', 'typeOfLesson', 'course', 'subgroup', 'room'])
            ->where('group_id', '=', $groupId)
            ->where('start_at', '>', $now)
            ->where(function (Builder $query) use ($subgroupId) {
                $query->where('subgroup_id', '=', $subgroupId)
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
    }
}
