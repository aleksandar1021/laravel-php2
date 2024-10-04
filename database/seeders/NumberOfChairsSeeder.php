<?php

namespace Database\Seeders;

use App\Models\NumberOfChairs;
use App\Models\TablePremiumLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NumberOfChairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['number' => '4', 'name'=>'Four'],
            ['number' => '6', 'name'=>'Six'],
            ['number' => '8', 'name'=>'Eight'],
            ['number' => '10', 'name'=>'Ten'],
            ['number' => '12', 'name'=>'Twelve']
        ];

        foreach ($items as $item) {
            NumberOfChairs::create($item);
        }
    }
}
