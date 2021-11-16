<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RegelmentenTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('reglementen')->delete();

        $regelement = [
            [
                'reglementen'    =>      'https://www.deltion.nl/getmedia/ec790e9f-53cc-4be7-9f26-ac8947fd7ebb/N20050CvB-Examenreglement-schooljaar-2020-2021-def.pdf',
            ],
        ];

        \DB::table('reglementen')->insert($regelement);
    }
}
