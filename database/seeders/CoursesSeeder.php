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
                'name' => 'Програмування',
            ],
            [
                'name' => 'Іноземна мова',
            ],
            [
                'name' => 'Психологія',
            ],
            [
                'name' => 'Інтелектуальний аналіз даних',
            ],
            [
                'name' => 'Операційні системи',
            ],
            [
                'name' => 'Безпека життєдіяльності',
            ],
            [
                'name' => 'Веб-технології',
            ],
            [
                'name' => 'Чисельні методи',
            ],
        ]);
    }
}
