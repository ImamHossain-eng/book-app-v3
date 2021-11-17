<?php

namespace Database\Seeders;
Use App\User;

use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'is_admin'=> 1,
                'password'=> bcrypt('babu1234'),
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'is_admin'=> 0,
                'password'=> bcrypt('babu1234'),
            ],
        ];
        foreach($userData as $key) {
            User::create($key);
        }
    }
}
