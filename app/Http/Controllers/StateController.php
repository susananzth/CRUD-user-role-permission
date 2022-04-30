<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use Illuminate\Support\Facades\Gate;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('state_index')) {
            return redirect()->route('home')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $states = State::all();
            return view('states.index', compact('states'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('state_add')) {
            return redirect()->route('state.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['countries'] = Country::all();
            return view('states.create', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
    {
        $validated = $request->validated();
        try {
            $state             = new State();
            $state->name       = $validated['name'];
            $state->country_id = $validated['country'];
            $state->iso_2      = $validated['iso_2'];
            $state->save();
            return redirect()->route('state.index')
                ->with('message', trans('message.Successfully registered state.'))
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput()
                ->with('message', trans('message.Oops! An error has occurred.'))
                ->with('alert_class', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        if (Gate::denies('state_index')) {
            // Muestra mensaje en alert de la vista. Función en JS refresca navegador.
            session()->flash('message', trans('message.You do not have the necessary permissions to execute the action.'));
            session()->flash('alert_class', 'danger');
            return response()->json([
                'code' => '403',
                'status' => 'Forbidden.'
            ]);
        } else {
            return response()->json([
                'code' => '200',
                'status' => 'Ok.',
                'state' => $state,
                'country' => $state->country->name,
                'cities' => $state->cities,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        if (Gate::denies('state_edit')) {
            return redirect()->route('state.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['countries'] = Country::all();
            $data['state']     = $state->load('cities');
            $data['cities']    = $state->cities->implode('name', ', ') . '.';
            return view('states.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStateRequest  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $validated = $request->validated();
        try {
            $state->update($validated);
            return redirect()->back()
                ->with('message', trans('message.State updated successfully.'))
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
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        if (Gate::denies('state_delete')) {
            return redirect()->route('state.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            try {
                $state->delete();
                return redirect()->route('state.index')
                    ->with('message', trans('message.State removed successfully.'))
                    ->with('alert_class', 'success');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('state.index')
                    ->with('message', trans('message.Oops! An error has occurred.'))
                    ->with('alert_class', 'danger');
            }
        }
    }
}
