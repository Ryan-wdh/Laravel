<?php

namespace App\Http\Controllers;

use App\Models\points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('points.index');
    }

    public function more($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(points $points)
    {

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(points $point)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, points $point)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }

    public function buy(Request $request)
    {
        $user = Auth::user();
        $pointsRequired = $request->input('points');

        //checkt dat de user genoeg punten heeft uit de input
        if ($user->points >= $pointsRequired) {
            $user->points -= $pointsRequired;
            $user->save();
        }
        return redirect()->back()->with('success', "You used $pointsRequired points.");
    }
}
