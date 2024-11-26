<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => 'adminpass',
        ]);

        User::create([
            'username' => 'user1',
            'password' => 'user1pass',
        ]);

        User::create([
            'username' => 'user2',
            'password' => 'user2pass',
        ]);
    }
}
