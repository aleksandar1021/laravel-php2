<?php

namespace Database\Seeders;

use App\Models\OurUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateUserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurUser::where('id', 7)->update(['image' => 't1.jpg']);
        OurUser::where('id', 8)->update(['image' => 't2.jpg']);
        OurUser::where('id', 9)->update(['image' => 't3.jpg']);
        OurUser::where('id', 1)->update(['image' => 'f3.jpg']);
        OurUser::where('id', 2)->update(['image' => 'f1.jpg']);
        OurUser::where('id', 4)->update(['image' => 'f2.jpg']);

    }
}
