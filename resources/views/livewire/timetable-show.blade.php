<div class="space-y-8">
    <div class="flex flex-col gap-y-6 justify-center items-center">
        <h2 class="text-2xl font-semibold mx-auto text-center">Поточний розклад для </h2>
        <div class="flex space-x-6">
            <label>
                Група:
                <select
                    wire:change="updateGroup($event.target.value)"
                    class="isolate mx-auto text-center"
                >
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </label>
            @if(count($subgroups))
                <label>
                    Підгрупа:
                    <select
                        wire:change="updateSubgroup($event.target.value)"
                        class="isolate mx-auto text-center"
                    >
                        @foreach($subgroups as $subgroup)
                            <option value="{{ $subgroup->id }}">{{ $subgroup->subgroup_value }}</option>
                        @endforeach
                    </select>
                </label>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-2 w-[64rem] mx-auto justify-items-center justify-center gap-y-3">
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
