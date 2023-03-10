<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users=([
            'role_id' => '1',
            'name' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'user',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'phone' => '(188) 627-8752',
            'designation_id' => '1',
        ]);

        DB::table('users')->insert($users);

    }
}
