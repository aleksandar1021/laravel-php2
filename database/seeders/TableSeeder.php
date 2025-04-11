<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Tables;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Table 1', 'description' => 'Description for table 1', 'image'=>'t1.png','id_number'=>1,'id_level'=>1],
            ['name' => 'Table 2', 'description' => 'Description for table 2', 'image'=>'t2.png','id_number'=>2,'id_level'=>2],
            ['name' => 'Table 3', 'description' => 'Description for table 3', 'image'=>'t3.png','id_number'=>3,'id_level'=>3],

            ['name' => 'Table 4', 'description' => 'Description for table 4', 'image'=>'t5.jpg','id_number'=>2,'id_level'=>3],
            ['name' => 'Table 5', 'description' => 'Description for table 5', 'image'=>'t6.jpg','id_number'=>3,'id_level'=>1],
            ['name' => 'Table 6', 'description' => 'Description for table 6', 'image'=>'t7.jpg','id_number'=>2,'id_level'=>3],
            ['name' => 'Table 7', 'description' => 'Description for table 7', 'image'=>'t8.jpg','id_number'=>3,'id_level'=>2]


        ];

        foreach ($items as $item) {
            Table::create($item);
        }
    }
}
