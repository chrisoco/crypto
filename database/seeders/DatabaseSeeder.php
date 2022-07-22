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
        \App\Models\User::factory([
            'name' => 'Chris OConnor',
            'email' => 'it.chris.oc@gmail.com'
        ])->create();

        \App\Models\User::factory([
            'name' => 'Test - User',
            'email' => 'tanksuo@gmail.com'
        ])->create();

        // \App\Models\User::factory(10)->create();

        $this->call([
           // UserSeeder::class,
        ]);

    }
}
