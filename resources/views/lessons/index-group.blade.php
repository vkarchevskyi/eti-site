<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table, tr, td {
        border: 1px solid black;
    }

    td {
        text-align: center;
    }
</style>
<body>

<section id="timetable">
    <section>
        @php use App\Enums\Days; @endphp
        @foreach($weeklyTimetable as $dayTimetable)
            <div>
                <h3>{{ Days::from($loop->index + 1)->getName() }}</h3>

                @foreach($dayTimetable as $lessons)
                    {{--                    зайвий foraech--}}
                    @foreach($lessons as $lesson)
                        <span>{{ (new DateTime($lesson->time_from))->format('H.i') }} - {{ (new DateTime($lesson->time_to))->format('H.i') }}</span>
                        <span>{{ $lesson->course->name_uk }} ({{ $lesson->typeOfLesson->short_name_uk }}). Викладач: {{ $lesson->teacher->second_name_uk . ' ' .$lesson->teacher->first_name_uk }}<br></span>
                        <br>

                    @endforeach
                @endforeach
            </div>
        @endforeach
    </section>


    <form>
        @csrf

        <label>
            <select name="groupId">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name_uk }}</option>
                @endforeach
            </select>
        </label>

        <label>
            <select name="subgroupId">
                @foreach($group->subgroup as $subgroup)
                    <option value="{{ $subgroup->id }}"
                            @if($subgroup->id == $subgroupId)
                                selected
                            @endif
                    >
                        {{ $subgroup->subgroup_value }}
                    </option>
                @endforeach
            </select>
        </label>

        <input type="submit" value="Submit">
    </form>

</section>

</body>
</html>
