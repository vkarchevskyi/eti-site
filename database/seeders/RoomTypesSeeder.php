<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomType::query()->create([
            'name' => 'Аудиторія',
        ]);
        RoomType::query()->create([
            'name' => 'Кабінет',
        ]);
        RoomType::query()->create([
            'name' => 'Комп\'ютерний кабінет',
        ]);
    }
}
