<x-app-layout>
    <section>
        <h3>{{ $news->title }}</h3>
        <p>{{ $news->short_description }}</p>
        <p>{{ $news->content }}</p>
    </section>
</x-app-layout>
