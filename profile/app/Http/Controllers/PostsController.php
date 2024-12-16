<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = posts::orderBy('id', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function more($id)
    {

        $post = posts::findOrFail($id);
        return view('posts.more', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(posts $posts)
    {
        return view('posts.create', compact('posts'));
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

        posts::create($validated);

        return redirect()->route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posts $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //als er geen id wordt gevonden wordt er een error gegeven
        $post = posts::findorfail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
