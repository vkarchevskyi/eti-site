<div class="bg-white">
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
             aria-hidden="true">
            <div
                class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Привіт =)</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">Сайт наразі знаходиться у розробці, але ти можеш
                    поділитися своїм фідбеком</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Перейти до розкладу <span
                            aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
        <div
            class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div
                class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>

    <div class="grid grid-cols-2 w-1/2 mx-auto justify-items-center justify-center gap-y-3">
        @php
            $now = \Carbon\Carbon::now();

            /* @var \App\Models\Timetable $lesson */
        @endphp
        @for($i = 0; $i < 7; $i++)
            @foreach($lessons[$now->dayOfWeekIso] ?? [] as $lesson)
                @if(!$loop->index)
                    <h3 class="col-span-2 font-bold text-2xl">{{ \Illuminate\Support\Str::ucfirst($now->dayName) }}</h3>
                @endif
                <div class="border-2 rounded-lg w-96 flex flex-col py-3 px-6">
                    <h4 class="flex font-bold text-xl">
                        <span>{{ \Carbon\Carbon::make($lesson->start_at)->format('H:i') }}</span>
                        <span>-</span>
                        <span>{{ \Carbon\Carbon::make($lesson->end_at)->format('H:i') }}</span>
                    </h4>
                    <h5 class="font-normal text-lg">
                        <span>{{ $lesson->course->name }}</span>
                    </h5>
                    <p class="font-light flex justify-start gap-x-1">
                        <span>Викладач: </span>
                        <span class="font-normal">{{ $lesson->teacher->first_name }}</span>
                        <span class="font-normal">{{ $lesson->teacher->second_name }}.</span>
                    </p>
                    <p class="font-light flex justify-start gap-x-1">
                        Пара пройде у {{ __("room_types.{$lesson->room->roomType->name}" ) }} №
                        <span class="font-normal">
                                {{ $lesson->room->name }}
                        </span>
                    </p>
                </div>
            @endforeach
            @php($now->addDay())
        @endfor
    </div>
</div>
