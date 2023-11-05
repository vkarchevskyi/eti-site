<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Lesson;
use App\Repositories\LessonRepository;
use Illuminate\Database\Eloquent\Collection;

readonly class LessonsService
{
    public function __construct(private LessonRepository $lessonRepository)
    {
    }

    public function getSortedLessons(?int $groupId = null): Collection
    {
        $query = Lesson::query();
        $groupId
            ? $this->lessonRepository->getByGroupId($query, $groupId)
            : $this->lessonRepository->orderByGroupId($query);
        $query = $this->lessonRepository->orderByDayOfWeekId($query);
        $query = $this->lessonRepository->orderByOrder($query);

        return $query->get();
    }

    public function sortBy()
    {
        
    }
}
