<?php
declare(strict_types=1);

namespace App\Actions;

use App\Services\LessonsService;

readonly class GetLessons
{
    public function __construct(private LessonsService $lessonsService)
    {
    }

    public function execute()
    {
        $lessons = $this->lessonsService->getSortedLessons();


    }
}
