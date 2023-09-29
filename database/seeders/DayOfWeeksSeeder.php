<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayOfWeeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('day_of_weeks')->insert([
            [
                'uk' => ['name' => 'Понеділок',],
                'en' => ['name' => 'Monday',],
            ],
            [
                'uk' => ['name' => 'Вівторок'],
                'en' => ['name' => 'Tuesday'],
            ],
            [
                'uk' => ['name' => 'Середа'],
                'en' => ['name' => 'Wednesday'],
            ],
            [
                'uk' => ['name' => 'Четвер'],
                'en' => ['name' => 'Thursday'],
            ],
            [
                'uk' => ['name' => 'П\'ятниця'],
                'en' => ['name' => 'Friday'],
            ],
            [
                'uk' => ['name' => 'Субота'],
                'en' => ['name' => 'Saturday'],
            ],
            [
                'uk' => ['name' => 'Неділя'],
                'en' => ['name' => 'Sunday'],
            ],
        ]);
    }
}
