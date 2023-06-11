<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "Jimmie",
            "email" => "kghtetsan26@gmail.com",
            "phone" => "09757780775",
            "password" => bcrypt("123123123"),
        ]);
    }
}
