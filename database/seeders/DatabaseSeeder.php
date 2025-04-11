<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([MenuSeeder::class,
                     RoleSeeder::class,
                     UserSeeder::class,
                     MealCategorySeeder::class,
                     GallerySeeder::class,
                     CommentSeeder::class,
                     NetworkSeeder::class,
                     ChefNetworkSeeder::class,
                     TablePremiumLevelSeeder::class,
                     NumberOfChairsSeeder::class,
                     TableSeeder::class,
                     HomeSeeder::class,
                     UpdateUserImageSeeder::class,
                     TypeSeeder::class,
                     ActivitySeeder::class,
                     ReservationSeeder::class,
                     ReservationLineSeeder::class,
                     MessageSeeder::class
                    ]);
    }
}
