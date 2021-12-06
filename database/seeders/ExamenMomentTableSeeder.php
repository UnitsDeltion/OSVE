<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ExamenMomentTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('examen_moment')->delete();
        
        $tijden = array('00', '15', '30', '45');
        $datums = array('6', '7', '8', '9', '10', '13', '14', '15', '16', '17', '20', '21', '22', '23', '24', '27', '28', '29', '30', '31');
        $docenten = array('97047005@st.deltion.nl', '97047008@st.deltion.nl', '97071583@st.deltion.nl');
        $datumsBegin = array('6', '7', '8', '9', '10', '13', '14', '15', '16');
        $datumsEind = array('17', '20', '21', '22', '23', '24', '27', '28', '29', '30', '31');
        $examenMoment = array();

        for ($i=0; $i < 50; $i++) { 
            $data = [
                'examenid'              =>      random_int(1, 11),
                'datum'                 =>      '2022-01-' . $datums[array_rand($datums)],
                'tijd'                  =>      random_int(8, 17) . ':' . $tijden[array_rand($tijden)] . ":00",
                'plaatsen'              =>      random_int(10, 60),
                'geplande_docenten'     =>     $docenten[array_rand($docenten)],
                'examen_opgeven_begin'  =>      '2021-12-' . $datumsBegin[array_rand($datumsBegin)],
                'examen_opgeven_eind'   =>      '2021-12-' . $datumsEind[array_rand($datumsEind)],
            ];
            array_push($examenMoment, $data);
        }

        \DB::table('examen_moment')->insert($examenMoment);
    }
}