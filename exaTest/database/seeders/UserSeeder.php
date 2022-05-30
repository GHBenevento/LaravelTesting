<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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

        $users = [
            [
                'name' => 'Georgie', 'email' => 'georgie@email.com','password' => Hash::make('asdfgh')
            ],
            [
                'name' => 'Holly', 'email' =>'holly@email.com', 'password' => Hash::make('abcdef')
            ],

        ];

        DB::table('users')->insert($users);
    }
}
