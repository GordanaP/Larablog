<?php

namespace App\Http\Controllers\Role;

use App\Role;
use App\Facades\RedirectTo;
use App\Contracts\ModelManager;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Services\ManageModel\RoleManager;

class RoleController extends Controller
{
    private $modelManager;

    public function __construct(ModelManager $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles_count = Role::count();

        return view('roles.index', compact('roles_count'));
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
        // $role = Role::create($request->validated());
        $role = $this->modelManager->save($request->validated());

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
        // $role->update($request->validated());
        //
        $this->modelManager->save($request->validated());

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
        // RoleManager::get($role ?? $request->validated()['ids'])->remove();

        $this->modelManager->remove($role ?? $request->validated()['ids']);

        return RedirectTo::route('roles');
    }
}
