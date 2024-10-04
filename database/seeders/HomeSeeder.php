<?php

namespace Database\Seeders;

use App\Models\HomeText;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $home = [
            ['heading' => 'Delicious Dining Delights: A Culinary Journey at Global Food', 'text1'=>'Indulge in a culinary adventure at Global Food, where every dish is a masterpiece crafted with passion and precision. Join us and discover why Global Food is a destination for food lovers seeking exceptional dining in Belgrade', 'text2'=>'At Global food, our menu is a celebration of flavors and textures that will tantalize your taste buds. Each dish is meticulously prepared by our talented chefs, who draw inspiration from both local traditions and international cuisines.', 'image'=>'1.jpg']
        ];

        foreach ($home as $h) {
            HomeText::create($h);
        }
    }
}
