<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\TypeOfActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Login'],
            ['name' => 'Logout'],
            ['name' => 'Add table to reservation'],
            ['name' => 'Checkout reservation'],
            ['name' => 'Remove reservation from cart'],
            ['name' => 'Leave a comment']
        ];

        foreach ($types as $type) {
            TypeOfActivity::create($type);
        }
    }
}
