<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user 1',
            'email' => 'user1@example.com',
            'password' => Hash::make(self::getRandomString(10))
        ]);
        DB::table('users')->insert([
            'name' => 'user 2',
            'email' => 'user2@example.com',
            'password' => Hash::make(self::getRandomString(10))
        ]);
        DB::table('users')->insert([
            'name' => 'user 3',
            'email' => 'user3@example.com',
            'password' => Hash::make(self::getRandomString(10))
        ]);
        DB::table('users')->insert([
            'name' => 'user 4',
            'email' => 'user4@example.com',
            'password' => Hash::make(self::getRandomString(10))
        ]);
    }

    public function getRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
