<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\MealCategory;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Spaghetti Bolognese', 'description'=>'A classic Italian dish consisting of spaghetti pasta topped with a rich tomato-based meat sauce', 'id_category'=>6, 'image'=>'1.jpg'],
            ['name' => 'Chicken Tikka Masala', 'description'=>'A popular Indian dish featuring marinated and grilled chicken pieces in a creamy tomato curry sauce', 'id_category'=>1, 'image'=>'2.jpg'],
            ['name' => 'Sushi', 'description'=>'A Japanese dish consisting of vinegared rice, often combined with other ingredients such as seafood and vegetables','id_category'=>1, 'image'=>'33.jpg'],
            ['name' => 'Hamburger', 'description'=>'A sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun', 'id_category'=>5, 'image'=>'4.jpg'],
            ['name' => 'Pad Thai', 'description'=>'A Thai stir-fried noodle dish typically made with rice noodles, shrimp, tofu, peanuts, and bean sprouts', 'id_category'=>3, 'image'=>'55.jpg'],
            ['name' => 'Lasagna', 'description'=>'An Italian dish made with layers of wide, flat pasta, typically with meat, cheese, and tomato sauce', 'id_category'=>6, 'image'=>'6.jpg'],
            ['name' => 'Margherita Pizza', 'description'=>'A classic Italian pizza topped with tomato sauce, fresh mozzarella cheese, basil, and olive oil', 'id_category'=>6, 'image'=>'7.jpg'],
            ['name' => 'Baklava', 'description'=>'A rich, sweet dessert pastry made of layers of filo filled with chopped nuts and sweetened and held together with syrup or honey', 'id_category'=>2, 'image'=>'22.jpg'],
            ['name' => 'Sandwich', 'description'=>'A food typically consisting of vegetables, sliced cheese or meat, placed on or between slices of bread', 'id_category'=>5, 'image'=>'66.jpg'],
            ['name' => 'Scallops', 'description'=>'A type of shellfish with a sweet, delicate flavor, often prepared by searing or grilling', 'id_category'=>7, 'image'=>'5.jpg']

        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
