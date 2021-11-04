<?php

namespace Database\Seeders;

use App\Models\GeplandeExamens;
use Illuminate\Database\Seeder;

class GeplandeExamensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GeplandeExamens = [
            // [
            //     'voornaam'            =>      'Martijn',
            //     'achternaam'          =>      'Schuman',
            //     'faciliteitenpas'     =>      'Nee',
            //     'studentnummer'       =>      '97047008',
            //     'klas'                =>      'AO3B',
            //     'crebo_nr'            =>      '25351',
            //     'examen'              =>      2,
            //     'examen_moment'       =>      3,
            //     'opmerkingen'         =>      null,
            // ],
        ];

        GeplandeExamens::insert($GeplandeExamens);
    }
}
