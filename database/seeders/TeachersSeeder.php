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
                'uk' => [
                    'first_name' => 'О.В.',
                    'second_name' => 'Ізвалов',
                ],
            ],
            [
                'uk' => [
                    'first_name' => 'О.Я.',
                    'second_name' => 'Бондар',
                ],
            ],
            [
                'uk' => [
                    'first_name' => 'Т.С.',
                    'second_name' => 'Нестеренко',
                ],
            ],
            [
                'uk' => [
                    'first_name' => 'С.Д.',
                    'second_name' => 'Паращук',
                ],
            ],
            [
                'uk' => [
                    'first_name' => 'А.Я.',
                    'second_name' => 'Бондар',
                ],
            ],
            [
                'uk' => [
                    'first_name' => 'А.М.',
                    'second_name' => 'Свобода',
                ],
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::query()->create($teacher);
        }
    }
}
