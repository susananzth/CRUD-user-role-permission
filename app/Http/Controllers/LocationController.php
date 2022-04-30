<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function states(Country $country)
    {
        return response()->json([
            'code' => '200',
            'status' => 'Ok.',
            'states' => $country->states,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\State $state
     * @return \Illuminate\Http\Response
     */
    public function cities(State $state)
    {
        return response()->json([
            'code' => '200',
            'status' => 'Ok.',
            'cities' => $state->cities,
        ]);
    }
}
