<?php

namespace Database\Seeders;

use App\Models\MealCategory;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Asian'],
            ['name' => 'Serbian Traditional'],
            ['name' => 'Mexican'],
            ['name' => 'Scandinavian'],
            ['name' => 'North American'],
            ['name' => 'European'],
            ['name' => 'Mediterranean']
        ];

        foreach ($items as $item) {
            MealCategory::create($item);
        }
    }
}
