<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $news = News::query()
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('livewire.news-index', [
            'news' => $news,
        ]);
    }
}
