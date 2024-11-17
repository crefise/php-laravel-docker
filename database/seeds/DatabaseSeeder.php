<?php

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
        // $this->call(UsersTableSeeder::class);

        \App\Haircuts::create([
            'cost' => 100,
            'name' => 'Haircut 1 male',
            'sex'  => 'male',
        ]);

        \App\Haircuts::create([
            'cost' => 200,
            'name' => 'Haircut 2 female',
            'sex'  => 'female',
        ]);

        \App\Haircuts::create([
            'cost' => 100,
            'name' => 'Haircut 3 male',
            'sex'  => 'male',
        ]);

        \App\Haircuts::create([
            'cost' => 250,
            'name' => 'Haircut 4 female',
            'sex'  => 'female',
        ]);
    }
}
