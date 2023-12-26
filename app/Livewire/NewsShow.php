<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsShow extends Component
{
    public News $news;

    public function mount(string $slug)
    {
        $this->news = News::query()
            ->where('slug', '=', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.news-show');
    }
}
