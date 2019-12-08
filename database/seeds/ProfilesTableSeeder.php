<?php

use App\User;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('email', 'd@author.com')->first()->profile()->create([
            'first_name' => 'Darko',
            'last_name' => 'Vlajkovic',
        ]);

        User::where('email', 'b@author.com')->first()->profile()->create([
            'first_name' => 'Bojana',
            'last_name' => 'Vlajkovic',
        ]);
    }
}
