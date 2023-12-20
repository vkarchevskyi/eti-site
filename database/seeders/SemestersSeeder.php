<?php

namespace Database\Seeders;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::query()->create([
            'name' => 'Семестр 2023-2024',
            'studying_start_date' => Carbon::make('01.09.2023'),
            'studying_end_date' => Carbon::make('29.12.2023'),
            'exam_start_date' => Carbon::make('08.01.2024'),
            'exam_end_date' => Carbon::make('20.01.2024'),
        ]);
    }
}
