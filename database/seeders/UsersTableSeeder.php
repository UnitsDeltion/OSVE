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
                'name'              =>      'Martijn Schuman',
                'voornaam'          =>      'Martijn',
                'achternaam'        =>      'Schuman',
                'adres'             =>      'Engberserf 26',
                'postcode'          =>      '7722AJ',
                'plaatsnaam'        =>      'Dalfsen',
                'land'              =>      'Nederland',
                'telefoonnummer'    =>      '+31 6 42863297',
                'email'             =>      '97047008@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      2,
                'name'              =>      'Jesse Koldewijn',
                'voornaam'          =>      'Jesse',
                'achternaam'        =>      'Koldewijn',
                'adres'             =>      '',
                'postcode'          =>      '',
                'plaatsnaam'        =>      '',
                'land'              =>      '',
                'telefoonnummer'    =>      '+31 6 27211252',
                'email'             =>      '97032722@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      3,
                'name'              =>      'Pascal Palmbergen',
                'voornaam'          =>      'Pascal',
                'achternaam'        =>      'Palmbergen',
                'adres'             =>      '',
                'postcode'          =>      '',
                'plaatsnaam'        =>      '',
                'land'              =>      '',
                'telefoonnummer'    =>      '+31 6 40114303',
                'email'             =>      '97071583@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
            [
                'id'                =>      4,
                'name'              =>      'Bas Plat',
                'voornaam'          =>      'Bas',
                'achternaam'        =>      'Plat',
                'adres'             =>      'Engberserf 28',
                'postcode'          =>      '7722AJ',
                'plaatsnaam'        =>      'Dalfsen',
                'land'              =>      'Nederland',
                'telefoonnummer'    =>      '+31 6 24569460',
                'email'             =>      '97047005@st.deltion.nl',
                'password'          =>      bcrypt('ontwikkeling'),
            ],
        ];

        User::insert($users);
    }
}
