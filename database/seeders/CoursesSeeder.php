<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'uk' => [
                    'name' => 'Програмування',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Іноземна мова',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Психологія',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Інтелектуальний аналіз даних',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Операційні системи',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Безпека життєдіяльності',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Веб-технології',
                ]
            ],
            [
                'uk' => [
                    'name' => 'Чисельні методи',
                ]
            ],
        ]);
    }
}
