<?php

namespace App\Http\Controllers;

use App\Models\bus;
use Illuminate\Http\Request;
use App\Models\User;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bus $bus)
    {
        //
    }

    public function book(Request $request, $bus_id)
    {
        //zorgt ervoor dat er een user is ingelogd
        $user = auth()->user();

        //bus koppellen met user
        $user->buses()->attach($bus_id);
        $user->increment('points', 25);
        return redirect()->back()->with('success', 'Bus has been booked! You earned 25 points!');
    }
    public function remove($bus_id)
    {
        $user = auth()->user();

        //koppeling verwijderen
        $user->buses()->detach($bus_id);
        $user->increment('points', -25);
        return redirect()->route('dashboard');
    }
}

