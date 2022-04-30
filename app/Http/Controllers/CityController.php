<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Support\Facades\Gate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('city_index')) {
            return redirect()->route('home')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $cities = City::all();
            return view('cities.index', compact('cities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('city_add')) {
            return redirect()->route('city.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['states'] = State::all();
            return view('cities.create', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $validated = $request->validated();
        try {
            $city           = new City();
            $city->name     = $validated['name'];
            $city->state_id = $validated['state'];
            $city->save();
            return redirect()->route('city.index')
                ->with('message', trans('message.Successfully registered city.'))
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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        if (Gate::denies('city_index')) {
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
                'city' => $city,
                'state' => $city->state->name,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        if (Gate::denies('city_edit')) {
            return redirect()->route('city.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['states'] = State::all();
            $data['city']     = $city;
            return view('cities.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $validated = $request->validated();
        try {
            $city->update($validated);
            return redirect()->back()
                ->with('message', trans('message.City updated successfully.'))
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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        if (Gate::denies('city_delete')) {
            return redirect()->route('city.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            try {
                $city->delete();
                return redirect()->route('city.index')
                    ->with('message', trans('message.City removed successfully.'))
                    ->with('alert_class', 'success');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('city.index')
                    ->with('message', trans('message.Oops! An error has occurred.'))
                    ->with('alert_class', 'danger');
            }
        }
    }
}
