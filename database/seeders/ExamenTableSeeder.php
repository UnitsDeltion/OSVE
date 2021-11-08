<?php

namespace Database\Seeders;

use App\Models\Examen;
use Illuminate\Database\Seeder;

class ExamenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examens = [
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'B1 K1 Hospitality',
                'vak'               =>      'Hospitality',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',

            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'P1 K1 TREX',
                'vak'               =>      'TREX',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Schrijven',
                'vak'               =>      'Duits',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Spreken',
                'vak'               =>      'Duits',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Schrijven B1',
                'vak'               =>      'Engels Generiek',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Spreken B1',
                'vak'               =>      'Engels Generiek',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Gesprekken voeren B1',
                'vak'               =>      'Engels Generiek',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Lezen A2',
                'vak'               =>      'Engels Generiek',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'B1 K2 Back Office',
                'vak'               =>      'Back Office',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25351,
                'examen'            =>      'Luisteren',
                'vak'               =>      'Duits',
                'geplande_docenten'   =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],
            [
                'crebo_nr'          =>      25352,
                'examen'            =>      'Luisteren',
                'vak'               =>      'Duits',
                'geplande_docenten'   =>    '97071583@st.deltion.nl',
                'examen_opgeven_begin' => '2021-10-28',
                'examen_opgeven_eind' => '2021-11-18',
                'datum' => '2021-11-20',
            ],

        ];

        Examen::insert($examens);
    }
}
