<?php

namespace Database\Seeders;

use App\Models\MealCategory;
use App\Models\SocialNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Facebook', 'icon'=>'fa fa-facebook'],
            ['name' => 'Twitter', 'icon'=>'fa fa-twitter'],
            ['name' => 'Instagram', 'icon'=>'fa fa-instagram'],
            ['name' => 'Linkedin', 'icon'=>'fa fa-linkedin'],
        ];

        foreach ($items as $item) {
            SocialNetwork::create($item);
        }
    }
}
