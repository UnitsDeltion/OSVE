<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ReglementTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('reglement')->delete();

        $reglement = [
            [
                'reglement'    =>      'https://www.deltion.nl/getmedia/ec790e9f-53cc-4be7-9f26-ac8947fd7ebb/N20050CvB-Examenreglement-schooljaar-2020-2021-def.pdf',
            ],
        ];

        \DB::table('reglement')->insert($reglement);
    }
}
