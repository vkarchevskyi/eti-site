<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubgroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subgroups')->insert([
            [
                'group_id' => 1,
                'subgroup_value' => 1,
            ],
            [
                'group_id' => 1,
                'subgroup_value' => 2,
            ]
        ]);
    }
}
