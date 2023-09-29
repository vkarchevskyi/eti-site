<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeOfLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_of_lessons')->insert([
            [
                'uk' => [
                    'name' => 'Лабораторна работа',
                    'short_name' => 'лб',
                ],
                'en' => [
                    'name' => 'Laboratory work',
                    'short_name' => 'lab',
                ],
            ],
            [
                'uk' => [
                    'name' => 'Семінар',
                    'short_name' => 'с',
                ],
                'en' => [
                    'name' => 'Seminar',
                    'short_name' => 's',
                ],
            ],
        ]);
    }
}
