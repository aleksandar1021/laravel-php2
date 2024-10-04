<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'User User', 'email' => 'user@gmail.com', 'message'=>"Message from user"],
            ['name' => 'User User', 'email' => 'user@gmail.com', 'message'=>"Message from user"]

        ];

        foreach ($items as $item) {
            Message::create($item);
        }
    }
}
