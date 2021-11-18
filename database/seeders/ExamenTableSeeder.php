<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ExamenTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('examens')->delete();

        $examens = [
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'B1 K1 Hospitality',
                'vak'                       =>      'Hospitality',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',

            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'P1 K1 TREX',
                'vak'                       =>      'TREX',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Schrijven',
                'vak'                       =>      'Duits',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Spreken',
                'vak'                       =>      'Duits',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Schrijven B1',
                'vak'                       =>      'Engels Generiek',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Spreken B1',
                'vak'                       =>      'Engels Generiek',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Gesprekken voeren B1',
                'vak'                       =>      'Engels Generiek',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Lezen A2',
                'vak'                       =>      'Engels Generiek',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'B1 K2 Back Office',
                'vak'                       =>      'Back Office',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Luisteren',
                'vak'                       =>      'Duits',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      2,
                'examen'                    =>      'Luisteren',
                'vak'                       =>      'Duits',
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],

        ];

        \DB::table('examens')->insert($examens);
    }
}
