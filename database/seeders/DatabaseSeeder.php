<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PropertyCategorySeeder::class,
            BadgeSeeder::class,
            AmenitySeeder::class,
        ]);
    }
}
