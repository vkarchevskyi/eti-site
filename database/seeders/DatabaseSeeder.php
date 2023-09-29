<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         $this->call(TeachersSeeder::class);
         $this->call(TypeOfLessonsSeeder::class);
         $this->call(CoursesSeeder::class);
         $this->call(GroupsSeeder::class);
         $this->call(SubgroupsSeeder::class);
         $this->call(LessonsSeeder::class);
    }
}
