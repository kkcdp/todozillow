<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'First User',
            'email' => 'test@example.com',
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Second User',
            'email' => 'test2@example.com',
        ]);

        //password for those two ares = 'password'

        \App\Models\Group::factory(5)->create([
            'by_user_id' => 1
        ]);

        \App\Models\Group::factory(5)->create([
            'by_user_id' => 2
        ]);



        \App\Models\Todo::factory(10)->create(
            // 'by_user_id' => 1
            // 'by_group_id' => 2,
        );



    }
}
