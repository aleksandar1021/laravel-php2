<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\TablePremiumLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TablePremiumLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Exclusive'],
            ['name' => 'Premium'],
            ['name' => 'Classic'],
        ];

        foreach ($items as $item) {
            TablePremiumLevel::create($item);
        }
    }
}
