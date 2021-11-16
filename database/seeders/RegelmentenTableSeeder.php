<?php

namespace Database\Seeders;

use App\Models\Opleidingen;
use Illuminate\Database\Seeder;
use App\Models\RegelementBeheer;

class RegelmentenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RegelementBeheer = [
            [
                'regelement'    =>      'https://www.deltion.nl/getmedia/ec790e9f-53cc-4be7-9f26-ac8947fd7ebb/N20050CvB-Examenreglement-schooljaar-2020-2021-def.pdf',
            ],
        ];

        RegelementBeheer::insert($RegelementBeheer);
    }
}
