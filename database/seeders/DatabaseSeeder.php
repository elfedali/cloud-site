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
            'username' => 'webmaster',
            'phone' => '0600000000',
            'address' => 'Rue 1',
            'city' => 'Casablanca',
            'zip' => '20000',
            'country' => 'Morocco',

        ]);
        \App\Models\User::factory(10)->create();

        // \App\Models\Term::factory(10)->create();
        $this->call(TermSeeder::class);

        \App\Models\Shop::factory(10)->create();
    }
}
