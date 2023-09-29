<?php
declare(strict_types=1);

namespace App\Actions;

use App\Services\LessonsService;
use Illuminate\Database\Eloquent\Collection;

readonly class GetGroupLessons
{
    public function __construct(private LessonsService $lessonsService)
    {
    }

    public function execute(int $groupId): Collection
    {
        $groupLessons = $this->lessonsService->getSortedLessons($groupId);

        return $groupLessons;
    }
}
