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
            'name' => 'Alberto De Negro',
            'username' => 'admin',
            'password' => 'adminpass',
            'user_Role' => 'Administrator',

        ]);

        User::create([
            'name' => 'Vlademir Potin',
            'username' => 'user1',
            'password' => 'user1pass',
            'user_Role' => 'Data Center Staff',
        ]);

        User::create([
            'name' => 'Christopher thanos',
            'username' => 'user2',
            'password' => 'user2pass',
            'user_Role' => 'Data Center Staff',
        ]);
    }
}
