<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\State;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Illuminate\Support\Facades\Gate;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('country_index')) {
            return redirect()->route('home')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $countries = Country::all();
            return view('countries.index', compact('countries'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('country_add')) {
            return redirect()->route('country.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['currencies'] = Currency::all();
            $data['states']     = State::where('country_id', null)->get(); // donde sea null
            return view('countries.create', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $validated = $request->validated();
        try {
            $country             = new Country();
            $country->name       = $validated['name'];
            $country->iso_2      = $validated['iso_2'];
            $country->iso_3      = $validated['iso_3'];
            $country->iso_number = $validated['iso_number'];
            $country->phone_code = $validated['phone_code'];
            $country->save();
            $country->currencies()->sync($validated['currency']);
            return redirect()->route('country.index')
                ->with('message', trans('message.Successfully registered country.'))
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
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        if (Gate::denies('country_index')) {
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
                'country' => $country,
                'currencies' => $country->currencies,
                'states' => $country->states,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        if (Gate::denies('country_edit')) {
            return redirect()->route('country.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            $data['currencies'] = Currency::all();
            $data['country']    = $country->load('currencies')->load('states');
            $data['states'] = $country->states->implode('name', ', ') . '.';
            return view('countries.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $validated = $request->validated();
        try {
            $country->update($validated);
            $country->currencies()->sync($validated['currency']);
            return redirect()->back()
                ->with('message', trans('message.Country updated successfully.'))
                ->with('alert_class', 'success');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->withInput()
                ->with('message', trans('message.Oops! An error has occurred.'))
                ->with('alert_class', 'danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if (Gate::denies('country_delete')) {
            return redirect()->route('country.index')
                ->with('message', trans('message.You do not have the necessary permissions to execute the action.'))
                ->with('alert_class', 'danger');
        } else {
            try {
                $country->delete();
                return redirect()->route('country.index')
                    ->with('message', trans('message.Country removed successfully.'))
                    ->with('alert_class', 'success');
            } catch (\Illuminate\Database\QueryException $th) {
                return redirect()->route('country.index')
                    ->with('message', trans('message.Cannot delete because this record is in use.'))
                    ->with('alert_class', 'danger');
            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->route('country.index')
                    ->with('message', trans('message.Oops! An error has occurred.'))
                    ->with('alert_class', 'danger');
            }
        }
    }
}
