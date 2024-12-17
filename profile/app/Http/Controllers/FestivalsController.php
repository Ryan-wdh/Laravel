<?php

namespace App\Http\Controllers;

use App\Models\festivals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FestivalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $festivals = festivals::orderBy('id', 'desc')->get();
        return view('festivals.index', compact('festivals'));
    }

    public function more($id)
    {

        $festivals = festivals::findOrFail($id);
        return view('festivals.more', compact('festivals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(festivals $festivals)
    {
        return view('festivals.create', compact('festivals'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $validated['user_id'] = Auth::id();

        festivals::create($validated);

        return redirect()->route('festivals.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Haal het specifieke festival en de bussen op die eraan gekoppeld zijn
        $festival = festivals::with('buses')->findOrFail($id);

        // Geef het festival en de bussen door aan de view
        return view('festivals.show', [
            'festival' => $festival,
            'buses' => $festival->buses, // Hier geef je de bussen door
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(festivals $festival)
    {
        return view('festivals.edit', compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, festivals $festival)
    {
        $festival->title = $request->title;
        $festival->content = $request->content;
        $festival->save();

        return redirect()->route('festivals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //als er geen id wordt gevonden wordt er een error gegeven
        $festival = festivals::findorfail($id);
        $festival->delete();
        return redirect()->route('festivals.index');
    }
}
