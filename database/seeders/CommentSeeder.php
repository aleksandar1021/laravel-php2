<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['subject' => 'Restaurant recommendations', 'message' => 'The restaurant is very good, all recommendations for this restaurant', 'active'=>'1', 'id_user'=>'1'],
            ['subject' => 'Kudos to the staff', 'message' => 'The friendliest staff I have ever met in a restaurant, all praises', 'active'=>'1', 'id_user'=>'2'],
            ['subject' => 'Good specialties', 'message' => 'This restaurant has the best specialties in town, all praises', 'active'=>'1', 'id_user'=>'3'],
            ['subject' => 'Affordable prices', 'message' => 'The prices are not very high, everyone can afford this kind of pleasure', 'active'=>'1', 'id_user'=>'4'],
            ['subject' => 'BAD RESTAURANT', 'message' => 'BAD RESTAURANT', 'active'=>'0', 'id_user'=>'6'],

        ];

        foreach ($items as $item) {
            Comment::create($item);
        }
    }
}
