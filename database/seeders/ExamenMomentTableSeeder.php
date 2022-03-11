<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ExamenMomentTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('examen_moment')->delete();
        
        //Elk kwartier kan er een examen worden gehouden
        $tijden = array('00', '15', '30', '45');
        //De werkdagen van de maand januari
        $datums = array('3', '4', '5', '6', '7', '10', '11', '12', '13', '14', '17', '18', '19', '20', '21', '24', '25', '26', '27', '28');
        //De beschikbare docenten
        $docenten = array('97047005@st.deltion.nl', '97047008@st.deltion.nl', '97071583@st.deltion.nl');
        $datumsBegin = array('3', '4', '5', '6', '7', '10', '11', '12', '13', '14', '17');
        $datumsEind = array('18', '19', '20', '21', '24', '25', '26', '27', '28', '31');
        $examenMoment = array();

        for ($i=0; $i < 50; $i++) { 
            $datum = '2022-04-' . $datums[array_rand($datums)];

            $data = [
                'examenid'              =>      random_int(1, 11),
                'datum'                 =>      $datum,
                'tijd'                  =>      random_int(8, 17) . ':' . $tijden[array_rand($tijden)] . ":00",
                'plaatsen'              =>      random_int(1, 60),
                'geplande_docenten'     =>      $docenten[array_rand($docenten)],
                'examen_opgeven_begin'  =>      '2022-01-' . $datumsBegin[array_rand($datumsBegin)],
                'examen_opgeven_eind'   =>      $datum,
            ];
            array_push($examenMoment, $data);
        }

        \DB::table('examen_moment')->insert($examenMoment);
    }
}