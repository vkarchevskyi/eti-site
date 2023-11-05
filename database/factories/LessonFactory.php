<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Subgroup;
use App\Models\Teacher;
use App\Models\TypeOfLesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        $types = TypeOfLesson::all();
        $groups = Group::all();
        $subgroups = Subgroup::all();

        $order = random_int(1, 5);
        return [
            'group_id' => $groups->random()->id,
            'order' => $order,
            'subgroup_id' => random_int(0, 1) ? $subgroups->random()->id : null,
            'is_numerator' => random_int(0, 1),
            'type_of_lesson_id' => $types->random()->id,
            'teacher_id' => $teachers->random()->id,
            'course_id' => $courses->random()->id,
            'day_of_week_id' => random_int(1, 5),
            'time_from' => collect(['8:30', '10:10', '12:10', '13:40', '15:30'])->get($order - 1),
            'time_to' => collect(['10:00', '11:40', '13:40', '15:20', '17:00'])->get($order - 1),
        ];
    }
}
