<?php

namespace Database\Seeders;

use App\Models\Opleidingen;
use Illuminate\Database\Seeder;

class OpleidingenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        Opleidingen::insert($opleidingen);
    }
}
