<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        select {
            display: block;
            margin: 0.4rem 0;
        }
    </style>
</head>
<body>
<form action="{{ route('lessons.store') }}" method="POST">
    @csrf
    @php
        $days = [[
            'name_uk' => 'Понеділок',
            'name_en' => 'Monday',
        ],
        [
            'name_uk' => 'Вівторок',
            'name_en' => 'Tuesday',
        ],
        [
            'name_uk' => 'Середа',
            'name_en' => 'Wednesday',
        ],
        [
            'name_uk' => 'Четвер',
            'name_en' => 'Thursday',
        ],
        [
            'name_uk' => 'П\'ятниця',
            'name_en' => 'Friday',
        ],
        [
            'name_uk' => 'Субота',
            'name_en' => 'Saturday',
        ],
        [
            'name_uk' => 'Неділя',
            'name_en' => 'Sunday',
        ]];
    @endphp
    <label for="group">Група: </label>
    <select name="groupId" id="group">
        @foreach($groups as $group)
            <option value="{{ $group->id }}">{{ $group->name_uk }}</option>
        @endforeach
    </select>
    <label for="order">Номер пари:</label>
    <select name="order" id="order">
        @for($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}">{{ $i . ' пара' }}</option>
        @endfor
    </select>
    <label for="subgroup">Підгрупа:</label>
    <select name="subgroupId" id="subgroup">
        <option value="">{{ 'Дві підгрупи разом' }}</option>
        @foreach($subgroups as $subgroup)
            <option value="{{ $subgroup->id }}">{{ $subgroup->id . ' підгруппа' }}</option>
        @endforeach
    </select>
    <label for="isNumerator">Чисельник/Знаменник</label>
    <select name="isNumerator" id="isNumerator">
        <option value="">Немає розділення</option>
        <option value="1">Чисельник</option>
        <option value="0">Знаменник</option>
    </select>
    <label for="typeOfLesson">Тип пари:</label>
    <select name="typeOfLessonId" id="typeOfLesson">
        @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name_uk }}</option>
        @endforeach
    </select>
    <label for="teacher">Викладач: </label>
    <select name="teacherId" id="teacher">
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->second_name_uk . ' ' . $teacher->first_name_uk }}</option>
        @endforeach
    </select>
    <label for="course">Предмет: </label>
    <select name="courseId" id="course">
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name_uk }}</option>
        @endforeach
    </select>
    <label for="dayOfWeek">День тижня: </label>
    <select name="dayOfWeekId" id="dayOfWeek">
        @for($i = 1; $i <= 7; $i++)
            <option value="{{ $i }}">{{ $days[$i - 1]['name_uk'] }}</option>
        @endfor
    </select>
    <label for="timeFrom">Початок пари</label>
    <input type="time" name="timeFrom" id="timeFrom"><br>
    <label for="timeTo">Кінець пари</label>
    <input type="time" name="timeTo" id="timeTo">

    <input type="submit" value="Submit">
</form>

</body>
</html>
