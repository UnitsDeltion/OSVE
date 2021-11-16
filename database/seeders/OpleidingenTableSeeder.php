<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class OpleidingenTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('opleidingen')->delete();

        $opleidingen = [
            [
                'crebo_nr'          =>      25351,
                'opleiding'    =>      'Leidinggevende Leisure & Hospitality',
            ],
            [
                'crebo_nr'          =>      25352,
                'opleiding'    =>      'Leidinggevende Travel & Hospitality',
            ],
            [
                'crebo_nr'          =>      25352,
                'opleiding'    =>      'Leidinggevende Travel & Hospitality (Internationaal)',
            ],
            [
                'crebo_nr'          =>      25353,
                'opleiding'    =>      'Zelfstandig medewerker Leisure & Hospitality',
            ],
            [
                'crebo_nr'          =>      25354,
                'opleiding'    =>      'Zelfstandig medewerker Travel & Hospitality',
            ],

        ];

        \DB::table('opleidingen')->insert($opleidingen);
    }
}
