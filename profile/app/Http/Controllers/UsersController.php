<?php

namespace App\Http\Controllers;

//use App\Models\users;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(users $users)
    {
        return view('users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
        ]);
        users::create([
            'id'=> $request['id'],
            'name'=> $request['name'],
            'email'=> $request['email'
            ]]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
    {
        return view('users.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        //
    }
}
