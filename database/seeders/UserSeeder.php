<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'Administator',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => 'qwerty123',
                'phone_number' => '089192828829'
            ],

        ]);
    }
}
