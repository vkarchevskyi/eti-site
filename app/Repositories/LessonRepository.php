<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

readonly class LessonRepository
{
    public function getByGroupId(Builder $query, ?int $groupId = null): Builder
    {
        return $query->where('group_id', $groupId);
    }

    public function orderByOrder(Builder $query, string $order = 'asc'): Builder
    {
        return $query->orderBy('order', $order);
    }

    public function orderByDayOfWeekId(Builder $query, string $order = 'asc'): Builder
    {
        return $query->orderBy('day_of_week_id', $order);
    }

    public function orderByGroupId(Builder $query, string $order = 'asc'): Builder
    {
        return $query->orderBy('group_id', $order);
    }
}
