<?php

namespace App\Http\Controllers\Role;

use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;

class RoleAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoleResource::collection(Role::all());
    }
}
