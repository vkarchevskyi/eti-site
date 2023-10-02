<x-app-layout>
    @foreach($news as $newsItem)
        <section class="bg-white">
            <h3>{{ $newsItem->title }}</h3>
            <p>{{ $newsItem->short_description }}</p>
            <p>{{ $newsItem->content }}</p>
        </section>
    @endforeach
</x-app-layout>
