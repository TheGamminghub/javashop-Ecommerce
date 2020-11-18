<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rahul',
            'email' => 'rp@example.com',
            'password' => '$2y$10$FHGTC46A5ZXzT3nPEowiu.BQ4DRPZCC1PCRjYLeLxpDaTtXselENm', // secret
        ]);

    }
}
