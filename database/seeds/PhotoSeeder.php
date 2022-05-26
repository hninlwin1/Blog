<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->truncate();
        DB::table('photos')->insert(
            array(
                array(
                    "src"=>'balloon1.jpg',
                    "alt"=>'balloon1',
                    "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                     "updated_at" => Carbon::now()->format('Y-m-d H:i:s')
                ),
                array(
                    "src"=>'balloon2.jpg',
                    "alt"=>'balloon2',
                    "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at" => Carbon::now()->format('Y-m-d H:i:s')
                )
            )
        );
    }
}
