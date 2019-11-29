<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::whereName('admin')->first();
        $admin_email = 'g@admin.com';

        $author = Role::whereName('author')->first();
        $author_email = 'd@author.com';

        User::whereEmail($admin_email)
            ->first()
            ->roles()
            ->attach($admin);

        User::whereEmail($author_email)
            ->first()
            ->roles()
            ->attach($author);
    }
}
