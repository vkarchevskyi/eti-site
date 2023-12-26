<div class="max-w-4xl mx-auto grid grid-cols-2 justify-items-center justify-center">
    @php /* @var \App\Models\News $newsItem */ @endphp
    @foreach($news as $newsItem)
        <a
            href="{{ route('news.show', ['slug' => $newsItem->slug]) }}"
            class="w-96 h-96 rounded-lg"
        >
            <img
                class="rounded-lg"
                src="{{ asset('storage/' . $newsItem->preview_image_path) }}"
                alt=""
            />
            <h3 class="text-xl font-bold tracking-tight text-gray-900">
                {{ $newsItem->title }}
            </h3>
            <p class="text-gray-600 text-light three-lines">
                {{ $newsItem->short_description }}
            </p>
        </a>
    @endforeach
    <div class="block">
        {{ $news->links() }}
    </div>
</div>
