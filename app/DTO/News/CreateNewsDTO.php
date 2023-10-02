<?php

declare(strict_types=1);

namespace App\DTO\News;

class CreateNewsDTO
{
    public function __construct(
        public string $title,
        public string $short_description,
        public string $content
    ) {
    }
}
