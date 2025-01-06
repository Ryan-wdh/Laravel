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

    public function book(Request $request, $busId)
    {
        //zorgt ervoor dat er een user is ingelogd
        $user = auth()->user();

//
//        $bus = Bus::find($busId);
//
//        if (!$bus) {
//            return back()->with('error', 'Bus niet gevonden.');
//        }

        //bus koppellen met user
        $user->buses()->attach($busId);
        $user->increment('points', 5);
        return redirect()->back()->with('success', 'Bus has been booked! You earned 5 points!');
    }
}

