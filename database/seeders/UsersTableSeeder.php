<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                =>      1,
                'voornaam'          =>      'Martijn',
                'achternaam'        =>      'Schuman',
                'telefoonnummer'    =>      '+31 6 42863297',
                'email'             =>      '97047008@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      2,
                'voornaam'          =>      'Jesse',
                'achternaam'        =>      'Koldewijn',
                'telefoonnummer'    =>      '+31 6 27211252',
                'email'             =>      '97032722@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      3,
                'voornaam'          =>      'Pascal',
                'achternaam'        =>      'Palmbergen',
                'telefoonnummer'    =>      '+31 6 40114303',
                'email'             =>      '97071583@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      4,
                'voornaam'          =>      'Bas',
                'achternaam'        =>      'Plat',
                'telefoonnummer'    =>      '+31 6 24569460',
                'email'             =>      '97047005@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
        ];

        User::insert($users);
    }
}
