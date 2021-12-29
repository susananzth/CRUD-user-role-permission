<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('user_index')) {
            return redirect()->route('home')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        } else {
            $users = User::with('roles')->get();
            return view('users.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('user_add')) {
            return redirect()->route('user.index')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        } else {
            $roles = Role::all();
            return view('users.create', compact('roles'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        try {
            $user = User::create($request->validated());
            $user->roles()->sync($validated['role']);
            return redirect()->route('user.index')
                ->with('message', 'Usuario registrado con éxito.')
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput()
                ->with('message', 'Oops! Ha ocurrido un error.')
                ->with('alert_class', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Valida si tiene permiso de ver.
        if (Gate::denies('user_index')) {
            // Muestra mensaje en alert de la vista. Función en JS refresca navegador.
            session()->flash('message', 'No cuenta con los permisos necesarios para ejecutar la acción.');
            session()->flash('alert_class', 'danger');
            return response()->json([
                'code' => '403',
                'status' => 'Forbidden.'
            ]);
        } else {
            return response()->json([
                'code' => '200',
                'status' => 'Ok.',
                'user' => $user,
                'roles' => $user->roles,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('user_edit')) {
            return redirect()->route('user.index')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        } else {
            $data['roles'] = Role::all();
            $data['user'] = $user->load('roles');
            return view('users.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateUserRequest  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        try {
            $user->update($validated);
            $user->roles()->sync($validated['role']);
            return redirect()->back()
                ->with('message', 'Usuario actualizado con éxito.')
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput()
                ->with('message', 'Oops! Ha ocurrido un error.')
                ->with('alert_class', 'danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('user_delete')) {
            return redirect()->route('user.index')
                ->with('message', 'No cuenta con los permisos necesarios para ejecutar la acción.')
                ->with('alert_class', 'danger');
        } else {
            try {
                $user->delete();
                return redirect()->route('user.index')
                    ->with('message', 'Usuario eliminado con éxito.')
                    ->with('alert_class', 'success');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('user.index')
                    ->with('message', 'Oops! Ha ocurrido un error.')
                    ->with('alert_class', 'danger');
            }
        }
    }
}
