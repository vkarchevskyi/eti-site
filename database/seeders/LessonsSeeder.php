<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Monday and tuesday
        DB::statement(
            "INSERT INTO `lessons` (`id`, `group_id`, `order`, `subgroup_id`, `is_numerator`, `type_of_lesson_id`, `teacher_id`, `course_id`, `day_of_week_id`, `time_from`, `time_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	1,	1,	NULL,	1,	1,	1,	1,	'08:30',	'10:00',	'2023-09-30 17:30:42',	'2023-09-30 17:30:42',	NULL),
(2,	1,	2,	2,	NULL,	2,	5,	2,	1,	'10:10',	'11:40',	'2023-09-30 17:44:05',	'2023-09-30 17:44:05',	NULL),
(3,	1,	2,	1,	NULL,	3,	6,	2,	1,	'10:10',	'11:40',	'2023-09-30 17:44:34',	'2023-09-30 17:44:34',	NULL),
(4,	1,	3,	NULL,	NULL,	3,	1,	1,	1,	'12:10',	'13:40',	'2023-09-30 17:45:21',	'2023-09-30 17:45:21',	NULL),
(5,	1,	4,	2,	NULL,	1,	1,	1,	1,	'13:50',	'15:20',	'2023-09-30 17:45:57',	'2023-09-30 17:45:57',	NULL),
(6,	1,	1,	NULL,	1,	2,	3,	3,	2,	'03:30',	'10:00',	'2023-09-30 17:53:01',	'2023-09-30 17:53:01',	NULL),
(7,	1,	1,	2,	0,	1,	7,	1,	2,	'03:30',	'10:00',	'2023-09-30 17:53:43',	'2023-09-30 17:53:43',	NULL),
(8,	1,	2,	NULL,	NULL,	3,	3,	3,	2,	'10:10',	'11:40',	'2023-09-30 18:00:19',	'2023-09-30 18:00:19',	NULL),
(9,	1,	3,	NULL,	NULL,	3,	4,	5,	2,	'12:10',	'13:40',	'2023-09-30 18:01:04',	'2023-09-30 18:01:04',	NULL),
(10,	1,	3,	NULL,	NULL,	1,	4,	5,	2,	'13:50',	'15:20',	'2023-09-30 18:01:23',	'2023-09-30 18:01:23',	NULL);
"
        );
    }
}
