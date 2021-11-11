<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            OpleidingenTableSeeder::class,
            ExamenTableSeeder::class,
            GeplandeExamensTableSeeder::class,
            ExamenMomentTableSeeder::class
        ]);
    }
}
