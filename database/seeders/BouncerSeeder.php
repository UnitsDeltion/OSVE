<?php

namespace Database\Seeders;

use App\Models\User;
use Silber\Bouncer\Bouncer;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    public function run()
    {
        Bouncer::allow('opleidingsmanager')->everything();
        //Bouncer::forbid('admin')->toManage(User::class);

        Bouncer::allow('docent')->to('examen-beheer');
        //Bouncer::allow('editor')->toOwn(Post::class);

        $user1 = User::create([
            'id'                =>      1,
            'voornaam'          =>      'Martijn',
            'achternaam'        =>      'Schuman',
            'telefoonnummer'    =>      '+31 6 42863297',
            'email'             =>      '97047008@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user2 = User::create([
            'id'                =>      2,
            'voornaam'          =>      'Jesse',
            'achternaam'        =>      'Koldewijn',
            'telefoonnummer'    =>      '+31 6 27211252',
            'email'             =>      '97032722@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user3 = User::create([
            'id'                =>      3,
            'voornaam'          =>      'Pascal',
            'achternaam'        =>      'Palmbergen',
            'telefoonnummer'    =>      '+31 6 40114303',
            'email'             =>      '97071583@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user4 = User::create([
            'id'                =>      4,
            'voornaam'          =>      'Bas',
            'achternaam'        =>      'Plat',
            'telefoonnummer'    =>      '+31 6 24569460',
            'email'             =>      '97047005@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user5 = User::create([
            'id'                =>      5,
            'voornaam'          =>      'Test',
            'achternaam'        =>      'Docent',
            'telefoonnummer'    =>      '+31 6 24569460',
            'email'             =>      'docent@deltion.nl',
            'password'          =>      bcrypt('docent'),
        ]);

        $user1->assign('opleidingsmanager');
        $user2->assign('opleidingsmanager');
        $user3->assign('opleidingsmanager');
        $user4->assign('opleidingsmanager');
        $user4->assign('docent');
    }
}
