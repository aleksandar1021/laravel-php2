<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\OurUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'John', 'lastname' => 'Smith','email' => 'john@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '1', 'image'=>'avatar2.png'],
            ['name' => 'Michael', 'lastname' => 'Johnson','email' => 'michael@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '1', 'image'=>'avatar2.png'],
            ['name' => 'David', 'lastname' => 'Brown','email' => 'davidBrown@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '1', 'image'=>'avatar2.png'],
            ['name' => 'Emily', 'lastname' => 'Davis','email' => 'emily@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '1', 'image'=>'avatar2.png'],
            ['name' => 'Administrator', 'lastname' => 'Administrator','email' => 'administrator@gmail.com', 'password' => 'administrator', 'active' => '1', 'id_role' => '2', 'image'=>'avatar2.png'],
            ['name' => 'User', 'lastname' => 'User','email' => 'user@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '1', 'image'=>'avatar2.png'],

            ['name' => 'David', 'lastname' => 'Watson','email' => 'david@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '3', 'image'=>'t1.jpg'],
            ['name' => 'Shane', 'lastname' => 'Smith','email' => 'shane@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '3', 'image'=>'t2.jpg'],
            ['name' => 'Steve', 'lastname' => 'Warner','email' => 'steve@gmail.com', 'password' => 'sifra123', 'active' => '1', 'id_role' => '3', 'image'=>'t3.jpg']

        ];

        foreach ($users as $user) {
            $newUser = new OurUser();
            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->email = $user['email'];
            $newUser->password = bcrypt($user['password']);
            $newUser->active = $user['active'];
            $newUser->id_role = $user['id_role'];

            $newUser->save();
        }
    }
}
