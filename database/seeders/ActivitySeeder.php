<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            ['id_user' => '1', 'id_type'=>1, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '2', 'id_type'=>2, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '3', 'id_type'=>3, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '4', 'id_type'=>4, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '1', 'id_type'=>5, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '2', 'id_type'=>6, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '3', 'id_type'=>1, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '4', 'id_type'=>3, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '1', 'id_type'=>4, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '2', 'id_type'=>5, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '3', 'id_type'=>6, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '4', 'id_type'=>1, 'ip_address'=>'120.0.0.1'],
            ['id_user' => '1', 'id_type'=>2, 'ip_address'=>'120.0.0.1'],
        ];

        foreach ($activities as $a) {
            Activity::create($a);
        }
    }
}
