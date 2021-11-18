<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('users')->delete();

        $users = [
            [
                'id'                =>      1,
                'voornaam'          =>      'Martijn',
                'achternaam'        =>      'Schuman',
                'email'             =>      '97047008@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      2,
                'voornaam'          =>      'Jesse',
                'achternaam'        =>      'Koldewijn',
                'email'             =>      '97032722@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      3,
                'voornaam'          =>      'Pascal',
                'achternaam'        =>      'Palmbergen',
                'email'             =>      '97071583@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      4,
                'voornaam'          =>      'Bas',
                'achternaam'        =>      'Plat',
                'email'             =>      '97047005@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
        ];

        \DB::table('users')->insert($users);
    }
}
