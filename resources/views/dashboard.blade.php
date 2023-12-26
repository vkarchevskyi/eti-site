<x-app-layout>
    <div class="py-12 mt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-4 overflow-hidden shadow-sm sm:rounded-lg border">
                <div class="p-6 text-gray-900">
                    Привіт, {{ auth()->user()->name }}!
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Вийти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            <livewire:timetable-show :user="auth()->user()" />
        </div>
    </div>
</x-app-layout>
