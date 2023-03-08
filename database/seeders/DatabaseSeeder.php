<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\Category::factory(10)->create();
        $this->call(LaratrustSeeder::class);

        $this->call(AdminSeeder::class);

        $this->call(CategoriesSeeder::class);



        // \App\Models\Subcategory::factory(50)->create();

        // \App\Models\Servicescategory::factory(25)->create();

        // \App\Models\Comment::factory(10)->create();

        // \App\Models\Country::factory(10)->create();

        // \App\Models\Town::factory(100)->create();




        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
