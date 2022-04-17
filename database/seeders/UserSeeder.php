<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
            "role_id" => 1,
            "first_name"    =>  "Altaf",
            "last_name"     =>  "Korejo",
            "email"         =>  "abc@demo.com",
            "password"      =>  Hash::make("Abcd@1234"),
            "status"        =>  1
        ]);
    }
}
