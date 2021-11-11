<?php

use Bouncer;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    public function run()
    {
        Bouncer::allow('opleidingsmanager')->everything();
        //Bouncer::forbid('admin')->toManage(User::class);

        Bouncer::allow('docent')->to('examen-beheer', Post::class);
        //Bouncer::allow('editor')->toOwn(Post::class);

        // etc.
    }
}
