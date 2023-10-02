<x-app-layout>
    <form action="{{ route('news.update', $news) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <label>
            <input type="text" name="title" value="{{ $news->title }}">
        </label>
        <label>
            <input type="text" name="short_description" value="{{ $news->short_description }}">
        </label>
        <label><textarea name="content">{{ $news->content }}</textarea></label>
        <input type="submit" value="submit" class="bg-red-500">
    </form>
</x-app-layout>
