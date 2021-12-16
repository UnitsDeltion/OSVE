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
        $user5 = User::create([
            'id'                =>      5,
            'voornaam'          =>      'Test',
            'achternaam'        =>      'Docent',
            'email'             =>      'docent@deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);
        $user6 = User::create([
            'id'                =>      6,
            'voornaam'          =>      'Annelies',
            'achternaam'        =>      'van Midwoud',
            'email'             =>      'amidwoud@deltion.nl',
            'password'          =>      bcrypt('ontwikkeling'),
        ]);

        $user1->assign('ontwikkelaar');
        $user5->assign('docent');
        $user6->assign('beheerder');

        Bouncer::allow('beheerder')->everything();
        //Bouncer::forbid('admin')->toManage(User::class);

        Bouncer::allow('docent')->to('examen-beheer');
        //Bouncer::allow('editor')->toOwn(Post::class);

        Bouncer::allow('ontwikkelaar')->to('documentatie');
    }
}
