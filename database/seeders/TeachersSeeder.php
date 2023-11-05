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
                'first_name' => 'О.В.',
                'second_name' => 'Ізвалов',
            ],
            [
                'first_name' => 'О.Я.',
                'second_name' => 'Бондар',
            ],
            [
                'first_name' => 'Т.С.',
                'second_name' => 'Нестеренко',
            ],
            [
                'first_name' => 'С.Д.',
                'second_name' => 'Паращук',
            ],
            [
                'first_name' => 'А.Я.',
                'second_name' => 'Бондар',
            ],
            [
                'first_name' => 'А.М.',
                'second_name' => 'Свобода',
            ],
            [
                'first_name' => 'К.Ю.',
                'second_name' => 'Сурков',
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::query()->create($teacher);
        }
    }
}
