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
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            1 => 
            array (
                'id' => 2,
                'examenid' => 2,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            2 => 
            array (
                'id' => 3,
                'examenid' => 3,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            3 => 
            array (
                'id' => 4,
                'examenid' => 4,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            4 => 
            array (
                'id' => 5,
                'examenid' => 5,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            5 => 
            array (
                'id' => 6,
                'examenid' => 6,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            6 => 
            array (
                'id' => 7,
                'examenid' => 7,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            7 => 
            array (
                'id' => 8,
                'examenid' => 8,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            8 => 
            array (
                'id' => 9,
                'examenid' => 9,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            9 => 
            array (
                'id' => 10,
                'examenid' => 10,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
            10 => 
            array (
                'id' => 11,
                'examenid' => 11,
                'tijd' => '12:30:00',
                'plaatsen' => '30',
            ),
        ));
        
        
    }
}