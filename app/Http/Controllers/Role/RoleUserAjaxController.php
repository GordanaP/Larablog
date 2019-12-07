<?php

namespace App\Http\Controllers\Role;

use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class RoleUserAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        return UserResource::collection($role->users);
    }
}
