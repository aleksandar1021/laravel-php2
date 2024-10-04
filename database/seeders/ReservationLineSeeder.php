<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\ReservationLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReservationLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date1 = Carbon::now()->addDays(10)->toDateString();
        $date2 = Carbon::now()->addDays(15)->toDateString();

        $items = [
            ['id_reservation'=>1, 'date_time_of'=>"$date1", 'id_table'=>1, 'date_time_until'=>"$date2"],
            ['id_reservation'=>2, 'date_time_of'=>"$date1", 'id_table'=>2, 'date_time_until'=>"$date2"],
            ['id_reservation'=>3, 'date_time_of'=>"$date1", 'id_table'=>3, 'date_time_until'=>"$date2"],
            ['id_reservation'=>1, 'date_time_of'=>"$date1", 'id_table'=>4, 'date_time_until'=>"$date2"],
            ['id_reservation'=>1, 'date_time_of'=>"$date1", 'id_table'=>5, 'date_time_until'=>"$date2"],
            ['id_reservation'=>2, 'date_time_of'=>"$date1", 'id_table'=>6, 'date_time_until'=>"$date2"],
            ['id_reservation'=>2, 'date_time_of'=>"$date1", 'id_table'=>7, 'date_time_until'=>"$date2"],
        ];

        foreach ($items as $item) {
            ReservationLine::create($item);
        }
    }
}
