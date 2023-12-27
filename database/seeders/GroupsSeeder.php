<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert(
            [
                [
                    'name' => 'КН-22',
                    'supervisor_id' => Teacher::query()->where('can_be_supervisor', true)->first()->id,
                ],
                [
                    'name' => 'КН-21',
                    'supervisor_id' => Teacher::query()->where('can_be_supervisor', true)->first()->id,
                ],
            ]
        );
    }
}
