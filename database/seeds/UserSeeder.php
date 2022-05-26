<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        DB::table('users')->truncate();
        DB::table('users')->insert(
        array(
            array(
                "name" => 'hnin',
                "email" => 'hnin@gmail.com',
                "email_verified_at" => Carbon::now()->format('Y-m-d H:i:s'),
                "password" => '123456',
                "role" => 'intern',
                "slug" => '2143544efdsdgsdf',
                "remember_token" => '',
                "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => Carbon::now()->format('Y-m-d H:i:s')
            ),
            array(
                "name" => 'lwin',
                "email" => 'lwin@gmail.com',
                "email_verified_at" => Carbon::now()->format('Y-m-d H:i:s'),
                "password" => '123456',
                "role" => 'admin',
                "slug" => '2143544efdsdgsdf',
                "remember_token" => '',
                "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => Carbon::now()->format('Y-m-d H:i:s')
            ))
        );
    }
}
