<x-app-layout>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="text" name="short_description">
        <textarea name="content">
    </textarea>
        <input type="submit" value="submit" class="bg-white">
    </form>
</x-app-layout>
