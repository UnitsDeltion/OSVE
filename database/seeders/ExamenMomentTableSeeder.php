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
        
        \DB::table('examen_moment')->insert(array (
            0 => 
            array (
                'id' => 1,
                'examenid' => 1,
                'datum' => '2021-11-15',
                'tijd' => '9:45:00',
            ),
            1 => 
            array (
                'id' => 2,
                'examenid' => 1,
                'datum' => '2021-11-15',
                'tijd' => '12:30:00',
            ),
            2 => 
            array (
                'id' => 3,
                'examenid' => 1,
                'datum' => '2021-11-15',
                'tijd' => '15:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'examenid' => 1,
                'datum' => '2021-11-16',
                'tijd' => '9:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'examenid' => 2,
                'datum' => '2021-11-17',
                'tijd' => '12:45:00',
            ),
            5 => 
            array (
                'id' => 6,
                'examenid' => 3,
                'datum' => '2021-11-16',
                'tijd' => '12:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'examenid' => 4,
                'datum' => '2021-11-15',
                'tijd' => '9:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'examenid' => 4,
                'datum' => '2021-11-15',
                'tijd' => '12:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'examenid' => 4,
                'datum' => '2021-11-15',
                'tijd' => '16:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'examenid' => 4,
                'datum' => '2021-11-16',
                'tijd' => '10:15:00',
            ),
            10 => 
            array (
                'id' => 11,
                'examenid' => 4,
                'datum' => '2021-11-16',
                'tijd' => '12:45:00',
            ),
            11 => 
            array (
                'id' => 12,
                'examenid' => 4,
                'datum' => '2021-11-17',
                'tijd' => '9:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'examenid' => 4,
                'datum' => '2021-10-18',
                'tijd' => '11:00:00',
            ),
        ));
    }
}