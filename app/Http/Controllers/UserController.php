<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
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
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
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
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['roles'] = Role::all();
            $data['countries'] = Country::all();
            return view('users.create', $data);
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
            $user                = new User();
            $user->firstname     = $validated['firstname'];
            $user->lastname      = $validated['lastname'];
            $user->username      = $validated['username'];
            $user->email         = $validated['email'];
            $user->password      = bcrypt($validated['password']);
            if (isset($validated['code'])) {
                $user->phone_code_id = $validated['code'];
            }
            $user->phone         = $validated['phone'];
            if (isset($validated['city'])) {
                $user->city_id       = $validated['city'];
            }
            $user->address       = $validated['address'];
            $user->save();
            $user->roles()->sync($validated['role']);
            return redirect()->route('user.index')
                ->with('message', trans('message.User registered successfully.'))
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withInput()
                ->with('message', trans('message.Oops! An error has occurred.'))
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
            session()->flash('message', trans('message.You do not have the necessary permissions to execute the action.'));
            session()->flash('alert_class', 'danger');
            return response()->json([
                'code' => '403',
                'status' => 'Forbidden.'
            ]);
        } else {
            if (isset($user->phone_code_id)) {
                $country_code = Country::find($user->phone_code_id);
            }
            return response()->json([
                'code' => '200',
                'status' => 'Ok.',
                'user' => $user,
                'roles' => $user->roles,
                'country' => isset($user->city) ? $user->city->state->country->name : "",
                'state' => isset($user->city) ? $user->city->state->name : "",
                'city' => isset($user->city) ? $user->city->name : "",
                'code_phone' => isset($user->phone_code_id) ? $country_code->phone_code : "",
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
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['countries'] = Country::all();
            $data['states']    = State::all();
            $data['cities']    = City::all();
            $data['roles']     = Role::all();
            $data['user']      = $user->load('roles');
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
            if ($validated['password'] != null) {
                $validated['password'] = bcrypt($validated['password']);
            } else {
                $old_user = User::find($user->id);
                $validated['password'] = $old_user->password;
            }
            $user->update($validated);

            if (isset($validated['code'])) {
                $user->phone_code_id = $validated['code'];
            }
            if (isset($validated['city'])) {
                $user->city_id       = $validated['city'];
            }
            $user->save();
            $user->roles()->sync($validated['role']);
            return redirect()->back()
                ->with('message', trans('message.User updated successfully.'))
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput()
                ->with('message', trans('message.Oops! An error has occurred.'))
                ->with('alert_class', 'danger');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::find(Auth::id());
        $data['countries'] = Country::all();
        $data['states']    = State::all();
        $data['cities']    = City::all();
        $data['user']      = $user;
        return view('profile.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateUserRequest  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth::id());
        $validated = $request->validate([
            'username'      => ['required', 'alpha_num', 'max:30', Rule::unique('users')->ignore($user->id)],
            'email'         => ['required', 'string', 'email', 'max:200', Rule::unique('users')->ignore($user->id)],
            'code'          => ['required', 'exists:countries,id'],
            'phone'         => ['required', 'integer'],
            'country'       => ['required', 'integer', 'exists:countries,id'],
            'state'         => ['required', 'integer', 'exists:states,id'],
            'city'          => ['required', 'integer', 'exists:cities,id'],
            'address'       => ['required', 'string', 'max:250'],
        ]);
        try {
            $user->update($validated);

            if (isset($validated['code'])) {
                $user->phone_code_id = $validated['code'];
            }
            if (isset($validated['city'])) {
                $user->city_id       = $validated['city'];
            }
            $user->save();
            return redirect()->back()
                ->with('message', trans('message.Profile Updated Successfully'))
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput()
                ->with('message', trans('message.Oops! An error has occurred.'))
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
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            try {
                $user->delete();
                return redirect()->route('user.index')
                    ->with('message', trans('message.User removed successfully.'))
                    ->with('alert_class', 'success');
            } catch (\Throwable $th) {
                // throw $th;
                return redirect()->route('user.index')
                    ->with('message', trans('message.Oops! An error has occurred.'))
                    ->with('alert_class', 'danger');
            }
        }
    }
}
