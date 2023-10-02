<?php

namespace App\Actions\News;

use App\DTO\News\UpdateNewsDTO;
use App\Models\News;

class UpdateNews
{
    public function execute(UpdateNewsDTO $updateNewsDTO, News $news)
    {
        $news->title = $updateNewsDTO->title;
        $news->short_description = $updateNewsDTO->short_description;
        $news->content = $updateNewsDTO->content;
        $news->save();
    }
}
