<?php

namespace Database\Seeders;

use App\Models\Chef;
use App\Models\SocialNetworkUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['href' => 'https://www.facebook.com/', 'id_user'=>'7', 'id_social'=>'1'],
            ['href' => 'https://twitter.com/', 'id_user'=>'7', 'id_social'=>'2'],
            ['href' => 'https://instagram.com/', 'id_user'=>'7', 'id_social'=>'3'],
            ['href' => 'https://twitter.com/', 'id_user'=>'8', 'id_social'=>'2'],
            ['href' => 'https://instagram.com/', 'id_user'=>'8', 'id_social'=>'3'],
            ['href' => 'https://linkedin.com/', 'id_user'=>'9', 'id_social'=>'4'],
        ];

        foreach ($items as $item) {
            SocialNetworkUser::create($item);
        }
    }
}
