<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\GeplandeExamen;
use Illuminate\Database\Seeder;

class GeplandeExamenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $geplandeExamens = [
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      1,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()  
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      2,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      1,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      1,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      2,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      1,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      2,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      1,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      2,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      1,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],
            [
                'student_nr'          =>      25351,
                'klas'                =>      'FK2B',
                'examen'              =>      2,
                'faciliteiten_pas'    =>      'Ja',
                'opmerkingen'         =>      'geen',
                'datum'               =>      Carbon::now()
            ],

        ];

        GeplandeExamen::insert($geplandeExamens);
    }
}
