<?php

declare(strict_types=1);

namespace App\Actions\News;

use App\Models\News;

class GetNews
{
    public function execute()
    {
        return News::all();
    }
}
