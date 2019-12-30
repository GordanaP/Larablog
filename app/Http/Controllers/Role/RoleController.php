<?php

namespace App\Http\Controllers\Role;

use App\Role;
use App\Facades\RedirectTo;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var \App\Contracts\RoleRepository
     */
    private $roles;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
    {
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index')->with([
            'roles_count' => Role::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->validated());

        return RedirectTo::route('roles', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        return RedirectTo::route('roles', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Role | null $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleRequest $request, Role $role = null)
    {
        $this->roles->remove($role ?? $request->validated()['ids']);

        return RedirectTo::route('roles');
    }
}
