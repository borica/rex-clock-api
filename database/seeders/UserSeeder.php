<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'John Doe',
             'email' => 'test@example.com',
             'password' => bcrypt('1234')
         ]);
    }
}
