<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'daniel@developer.com',
                'password'       => bcrypt('daniel'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
