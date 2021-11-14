<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('role_index')) {
            return redirect()->route('home')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        }else{
            $roles = Role::with('permissions')->get();
            return view('roles.index', compact('roles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('role_add')) {
            return redirect()->route('role.index')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        }else{
            $permissions = Permission::all();
            return view('roles.create', compact('permissions'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:roles|max:255',
            'permission.*' => 'nullable|integer|exists:permissions,id',
        ]);
        try {
            $role = new Role;
            $role->title = $validated['title'];
            $role->save();
            if (isset($validated['permission'])) {
                $role->permissions()->sync($validated['permission']);
            }
            return redirect()->route('role.index')
                ->with('message', 'Rol registrado con éxito.')
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('role.index')
                ->with('message', 'Oops! Ha ocurrido un error.')
                ->with('alert_class', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // Valida si tiene permiso de ver.
        if (Gate::denies('role_index')) {
            // Muestra mensaje en alert de la vista. Función en JS refresca navegador.
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
        if (Gate::denies('role_edit')) {
            return redirect()->route('role.index')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        }else{
            $data['permissions'] = Permission::all();
            $data['role'] = $role->load('permissions');
            return view('roles.edit', $data);
        }
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
                //throw $th;
                return redirect()->route('role.index')
                    ->with('message', 'Oops! Ha ocurrido un error.')
                    ->with('alert_class', 'danger');
            }
        }
    }
}
