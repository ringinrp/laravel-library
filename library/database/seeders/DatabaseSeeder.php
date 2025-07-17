<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Library',
            'username' => 'admin',
            'email' => 'admin@gmail.com'
        ])->assignRole(Role::create(['name' => 'admin']));

        User::factory()->create([
            'name' => $name = 'Coy',
            'username' => usernameGenerator($name),
            'email' => 'coy@gmail.com'
        ])->assignRole(Role::create(['name' => 'operator']));

        User::factory()->create([
            'name' => $name = 'user',
            'username' => usernameGenerator($name),
            'email' => 'user@gmail.com'
        ])->assignRole(Role::create(['name' => 'member']));

        $this->call([
            PublisherSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
