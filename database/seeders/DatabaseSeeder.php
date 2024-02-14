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
            'name' => 'Webmaster',
            'email' => 'webmaster@restoly.ma',
            'password' => bcrypt('password'),
            'role' => \App\Models\User::ROLE_SUPER_ADMIN,
        ]);
        \App\Models\User::factory(10)->create();

        \App\Models\Term::factory(10)->create();

        \App\Models\Shop::factory(10)->create();
    }
}
