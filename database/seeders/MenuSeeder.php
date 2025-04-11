<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Home', 'href' => '/'],
            ['name' => 'Gallery', 'href' => 'gallery'],
            ['name' => 'Reservation', 'href' => 'reservation'],
            ['name' => 'Checkout', 'href' => 'checkout'],
            ['name' => 'Reservations', 'href' => 'reservations'],
            ['name' => 'Contact', 'href' => 'contact'],
            ['name' => 'Account', 'href' => 'account'],
            ['name' => 'Author', 'href' => 'author'],
            ['name' => 'Admin', 'href' => 'adminPage']
        ];

        foreach ($items as $item) {
            Menu::create($item);
        }
    }
}
