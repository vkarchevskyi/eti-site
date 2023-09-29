{{--<style>--}}
{{--    table, tr, td {--}}
{{--        border: 1px solid black;--}}
{{--    }--}}

{{--    td {--}}
{{--        text-align: center;--}}
{{--        width: 10rem;--}}
{{--        border-collapse: collapse;--}}
{{--    }--}}
{{--</style>--}}

<x-guest-layout>
    <section id="timetable" class="flex flex-col mx-auto">
        @foreach($weeklyTimetable as $timetable)
            {{--        @dd($timetable)--}}
            <table class="">
                <thead>
                <th colspan="2" class="text-white">{{ \App\Enums\Days::DAYS[$loop->index + 1]['name_uk'] }}</th>
                </thead>
                <tbody class="text-center">
                @foreach($timetable as $lessonsBase)
                    @php $lessons = $lessonsBase['lessons']; @endphp

                    {{--                Это всё херня, нужно добавить ещё один foearch по order-у --}}

                    @if($lessonsBase['week_division'])
                        <tr style="background-color: #aaaaaa;">
                            @php
                                $numerator = $lessons->where('is_numerator', true);
                                $denominator = $lessons->where('is_numerator', false);
                            @endphp
                            @foreach($numerator as $lesson)
                                @if (count($lessons) == 1 && $lesson->subgroup?->subgroup_value == 2)
                                    <td></td>
                                @endif
                                <td
                                    @if(count($lessons) == 1 && $lesson->subgroup?->subgroup_value == null)
                                        colspan="2"
                                    @endif
                                >
                                    {{ $lesson->course->name_uk }} ({{ $lesson->typeOfLesson->short_name_uk }})
                                    {{ $lesson->teacher->second_name_uk . ' ' .$lesson->teacher->first_name_uk }}
                                </td>
                                @if (count($lessons) == 1 && $lesson->subgroup?->subgroup_value == 1)
                                    <td></td>
                                @endif
                            @endforeach
                            @foreach($denominator as $lesson)
                                @if (count($lessons) == 1 && $lesson->subgroup?->subgroup_value == 2)
                                    <td></td>
                                @endif
                                <td
                                    @if(count($lessons) == 1 && $lesson->subgroup?->subgroup_value == null)
                                        colspan="2"
                                    @endif
                                >
                                    {{ $lesson->course->name_uk }} ({{ $lesson->typeOfLesson->short_name_uk }})
                                    {{ $lesson->teacher->second_name_uk . ' ' .$lesson->teacher->first_name_uk }}
                                </td>
                                @if (count($lessons) == 1 && $lesson->subgroup?->subgroup_value == 1)
                                    <td></td>
                                @endif
                            @endforeach
                        </tr>
                    @else
                        <tr>
                            @foreach($lessons as $lesson)
                                @if (count($lessons) == 1 && $lesson->subgroup?->subgroup_value == 2)
                                    <td></td>
                                @endif
                                <td
                                    @if(count($lessons) == 1 && $lesson->subgroup?->subgroup_value == null)
                                        colspan="2"
                                    @endif
                                >
                                    {{ $lesson->course->name_uk }} ({{ $lesson->typeOfLesson->short_name_uk }})
                                    {{ $lesson->teacher->second_name_uk . ' ' .$lesson->teacher->first_name_uk }}
                                </td>
                                @if (count($lessons) == 1 && $lesson->subgroup?->subgroup_value == 1)
                                    <td></td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                @endforeach

                </tbody>
            </table>
        @endforeach

    </section>

</x-guest-layout>
