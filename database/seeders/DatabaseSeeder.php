<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create(attributes: [
            'name' => 'Pratama Harun',
            'username' => 'pratama',
            'email' => 'pratama@gmail.com',
            'password' => Hash::make('password') //password bisa saja tidak diisi karena sudah default pada factories
        ]);

        $this->call(class : CategorySeeder::class);
        $this->call(class: PublisherSeeder::class);
    }
}
