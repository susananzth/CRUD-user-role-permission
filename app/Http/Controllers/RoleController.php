<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_index'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::with('permissions')->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;

        $role->title = $request->title;

        $role->save();

        $role->permissions()->sync($request->input('permission'));

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (Gate::denies('rolee_index')) {
            session()->flash('message', 'No cuenta con los permisos necesarios para ejecutar la acción.');
            session()->flash('alert_class', 'danger');
            return response()->json([
                'code' => '403',
                'status' => 'Forbidden.'
            ]);
        }else{
            return response()->json([
                'code' => '200',
                'status' => 'Ok.',
                'role' => $role,
                'permissions' => $role->permissions,
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['permissions'] = Permission::all();

        $data['role'] = $role->load('permissions');
        return view('roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (Gate::denies('role_delete')) {
            return redirect()->route('role.index')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        }else{
            try {
                $role->delete();
                return redirect()->route('role.index')
                    ->with('message', 'Rol eliminado con éxito.')
                    ->with('alert_class', 'success');
            } catch (\Throwable $th) {
                return redirect()->route('role.index')
                    ->with('message', 'Oops! Ha ocurrido un error.')
                    ->with('alert_class', 'danger');
            }
        }
    }
}
