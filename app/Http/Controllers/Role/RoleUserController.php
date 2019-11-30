<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Role;

class RoleUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        return view('users.create', compact('role'));
    }
}
