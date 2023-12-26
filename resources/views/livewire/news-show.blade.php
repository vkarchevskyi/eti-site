<div class="max-w-2xl mx-auto space-y-6">
    <h1 class="text-4xl font-bold tracking-tight text-gray-900 text-center">
        {{ $news->title }}
    </h1>
    <img
        class="rounded-lg"
        src="{{ asset('storage/' . $news->preview_image_path) }}"
        alt=""
    />
    {!! $news->content !!}
</div>
