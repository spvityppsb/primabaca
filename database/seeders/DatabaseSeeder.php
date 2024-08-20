<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'nip' => '123456789',
            'name' => 'IT',
            'password' => bcrypt('password'),
            'telp' => '08172733',
            'type' => 'Petugas',
            'foto' => 'WhatsApp Image 2022-12-11 at 17.38.08.jpeg',
        ]);
    }
}
