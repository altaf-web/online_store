<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                "first_name"    =>  "Altaf",
                'uuid'          => $uuid = Str::uuid()->toString(),
                "last_name"     =>  "Korejo",
                "phone_number"  =>  "03353134197",
                "role_id"       =>   2
            ]
        ]);
    }
}
