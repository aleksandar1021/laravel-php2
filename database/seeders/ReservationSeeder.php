<?php

namespace Database\Seeders;

use App\Models\NumberOfChairs;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['id_user'=>1],
            ['id_user'=>2],
            ['id_user'=>3],
        ];

        foreach ($items as $item) {
            Reservation::create($item);
        }
    }
}
