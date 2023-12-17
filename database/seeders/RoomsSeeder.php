<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            Room::query()->insert([
                [
                    'name' => '1',
                    'room_type_id' => 2
                ],
                [
                    'name' => '2',
                    'room_type_id' => 2
                ],
                [
                    'name' => '3',
                    'room_type_id' => 2
                ],
                [
                    'name' => '4',
                    'room_type_id' => 3
                ],
                [
                    'name' => '5',
                    'room_type_id' => 2
                ],
                [
                    'name' => '6',
                    'room_type_id' => 2
                ],
                [
                    'name' => '7',
                    'room_type_id' => 2
                ],
                [
                    'name' => '8',
                    'room_type_id' => 2
                ],
                [
                    'name' => '9',
                    'room_type_id' => 2
                ],
                [
                    'name' => '10',
                    'room_type_id' => 3
                ],
                [
                    'name' => '11',
                    'room_type_id' => 2
                ],
                [
                    'name' => '12',
                    'room_type_id' => 2
                ],
                [
                    'name' => '13',
                    'room_type_id' => 2
                ],
                [
                    'name' => '14',
                    'room_type_id' => 2
                ],
                [
                    'name' => '15',
                    'room_type_id' => 2
                ],
                [
                    'name' => '16',
                    'room_type_id' => 3
                ],
                [
                    'name' => '17',
                    'room_type_id' => 2
                ],
                [
                    'name' => '20',
                    'room_type_id' => 1
                ],
            ]);

            DB::commit();
        } catch (\Exception) {
            DB::rollBack();
        }
    }
}
