<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ExamenMomentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('examen_moment')->delete();
        
        $tijden = array('00', '15', '30', '45');
        $examenMoment = array();

        for ($i=0; $i < 50; $i++) { 
            $data = [
                'examenid'              =>      random_int(1, 11),
                'datum'                 =>      '2021-12-' . random_int(1, 31),
                'tijd'                  =>      random_int(8, 17) . ':' . $tijden[array_rand($tijden)] . ":00",
                'plaatsen'              =>      random_int(10, 60)
            ];
            array_push($examenMoment, $data);
        }

        \DB::table('examen_moment')->insert($examenMoment);
    }
}