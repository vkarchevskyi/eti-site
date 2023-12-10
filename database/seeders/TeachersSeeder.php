<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'first_name' => 'Олексій',
                'second_name' => 'Ізвалов',
                'middle_name' => 'Володимирович',
            ],
            [
                'first_name' => 'Ольга',
                'second_name' => 'Бондар',
                'middle_name' => 'Петрівна',
            ],
            [
                'first_name' => 'Тамара',
                'second_name' => 'Нестеренко',
                'middle_name' => 'Сергіївна',
            ],
            [
                'first_name' => 'Степан',
                'second_name' => 'Паращук',
                'middle_name' => 'Дмитрович',
            ],
            [
                'first_name' => 'Андрій',
                'second_name' => 'Бондар',
                'middle_name' => 'Якович',
            ],
            [
                'first_name' => 'Анастасія',
                'second_name' => 'Свобода',
                'middle_name' => 'Миколаївна',
            ],
            [
                'first_name' => 'Константин',
                'second_name' => 'Сурков',
                'middle_name' => 'Юрійович',
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::query()->create($teacher);
        }
    }
}
