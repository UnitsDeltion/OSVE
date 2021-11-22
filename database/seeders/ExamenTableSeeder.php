<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('examens')->delete();

        $examens = [
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'B1 K1 Hospitality',
                'vak'                       =>      'Hospitality',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',

            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'P1 K1 TREX',
                'vak'                       =>      'TREX',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Schrijven',
                'vak'                       =>      'Duits',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Spreken',
                'vak'                       =>      'Duits',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Schrijven B1',
                'vak'                       =>      'Engels Generiek',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Spreken B1',
                'vak'                       =>      'Engels Generiek',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Gesprekken voeren B1',
                'vak'                       =>      'Engels Generiek',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Lezen A2',
                'vak'                       =>      'Engels Generiek',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'B1 K2 Back Office',
                'vak'                       =>      'Back Office',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      1,
                'examen'                    =>      'Luisteren',
                'vak'                       =>      'Duits',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],
            [
                'opleiding_id'              =>      2,
                'examen'                    =>      'Luisteren',
                'vak'                       =>      'Duits',
                'uitleg'                    =>      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget magna maximus, cursus diam eu, malesuada odio. Curabitur accumsan mi eu mauris auctor maximus. Praesent ac urna eget velit pellentesque consectetur. Ut vitae consectetur nisi.",
                'geplande_docenten'         =>      '97071583@st.deltion.nl',
                'examen_opgeven_begin'      =>      '2021-10-28',
                'examen_opgeven_eind'       =>      '2021-11-18',
            ],

        ];

        \DB::table('examens')->insert($examens);
    }
}
