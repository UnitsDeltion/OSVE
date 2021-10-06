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
                'opleiding_naam'    =>      'Leidinggevende Leisure & Hospitality',
            ],
            [
                'crebo_nr'          =>      25352,
                'opleiding_naam'    =>      'Leidinggevende Travel & Hospitality',
            ],
            [
                'crebo_nr'          =>      25352,
                'opleiding_naam'    =>      'Leidinggevende Travel & Hospitality (Internationaal)',
            ],
            [
                'crebo_nr'          =>      25353,
                'opleiding_naam'    =>      'Zelfstandig medewerker Leisure & Hospitality',
            ],
            [
                'crebo_nr'          =>      25354,
                'opleiding_naam'    =>      'Zelfstandig medewerker Travel & Hospitality',
            ],

        ];

        Opleidingen::insert($opleidingen);
    }
}
