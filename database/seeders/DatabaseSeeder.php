<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = Role::factory()->count(2)->sequence(
            ['name' => 'Admin'],
            ['name' => 'User'],
        )->create();

        User::factory(10)->create([
            'role_id' => $roles[1]->id,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@filamentphp.com',
            'role_id' => $roles[0]->id,
        ]);
    }
}
