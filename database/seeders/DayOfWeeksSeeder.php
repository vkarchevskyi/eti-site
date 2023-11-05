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
                'name' => 'Понеділок'
            ],
            [
                'name' => 'Вівторок'
            ],
            [
                'name' => 'Середа'
            ],
            [
                'name' => 'Четвер'
            ],
            [
                'name' => 'П\'ятниця'
            ],
            [
                'name' => 'Субота'
            ],
            [
                'name' => 'Неділя'
            ],
        ]);
    }
}
