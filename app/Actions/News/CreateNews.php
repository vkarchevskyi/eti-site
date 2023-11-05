<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\DTO\News\CreateNewsDTO;
use App\Models\News;

class CreateNews
{
    public function execute(CreateNewsDTO $createNewsDTO): void
    {
        News::query()->create([
            'title' => $createNewsDTO->title,
            'short_description' => $createNewsDTO->short_description,
            'content' => $createNewsDTO->content,
        ]);
    }
}
