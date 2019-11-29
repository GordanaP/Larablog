<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNames = ['author', 'admin'];

        foreach ($roleNames as $name) {
            factory('App\Role')->create([
                'name' => $name
            ]);
        }
    }
}
