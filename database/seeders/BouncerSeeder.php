<?php

namespace Database\Seeders;

use Bouncer;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Silber\Bouncer\Bouncer;

class BouncerSeeder extends Seeder
{
    public function run()
    {
        $user1 = User::create([
            'id'                =>      1,
            'voornaam'          =>      'Martijn',
            'achternaam'        =>      'Schuman',
            'email'             =>      '97047008@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user2 = User::create([
            'id'                =>      2,
            'voornaam'          =>      'Jesse',
            'achternaam'        =>      'Koldewijn',
            'email'             =>      '97032722@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user3 = User::create([
            'id'                =>      3,
            'voornaam'          =>      'Pascal',
            'achternaam'        =>      'Palmbergen',
            'email'             =>      '97071583@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user4 = User::create([
            'id'                =>      4,
            'voornaam'          =>      'Bas',
            'achternaam'        =>      'Plat',
            'email'             =>      '97047005@st.deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user5 = User::create([
            'id'                =>      5,
            'voornaam'          =>      'Test',
            'achternaam'        =>      'Docent',
            'email'             =>      'docent@deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);

        $user1->assign('beheerder');
        $user2->assign('beheerder');
        $user3->assign('beheerder');
        $user4->assign('beheerder');
        $user5->assign('beheerder');

        Bouncer::allow('beheerder')->everything();
        //Bouncer::forbid('admin')->toManage(User::class);

        Bouncer::allow('docent')->to('examen-beheer');
        //Bouncer::allow('editor')->toOwn(Post::class);

        Bouncer::allow('ontwikkelaar')->to('documentatie');
    }
}
