<?php

use App\Role;
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
        factory(User::class, 7)->create();

        $author_role = Role::whereName('author')->first();
        $author_1 = factory(User::class)->states('author_1')->create();
        $author_2 = factory(User::class)->states('author_2')->create();

        User::whereIn('email', [$author_1->email, $author_2->email])->get()
            ->map(function($author) use($author_role) {
                $author->roles()->sync($author_role);
            });

        $admin_role = Role::whereName('admin')->first();
        factory(User::class)->states('admin')->create()
            ->roles()
            ->sync($admin_role);

    }
}
