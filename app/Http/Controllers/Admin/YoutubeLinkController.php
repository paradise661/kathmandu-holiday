<?php

namespace App\Http\Controllers\Admin;

use App\Models\YoutubeLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YoutubeLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $youtube = YoutubeLink::oldest('order')->paginate(20);
        return view('admin.youtube.index',compact('youtube'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);
        YoutubeLink::create($request->all());

        return redirect()->route('youtube.index')->with('success', 'Youtube Link added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $youtube = YoutubeLink::findOrFail($id);
        return view('admin.youtube.edit',compact('youtube'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|url',
        ]);
        $youtube = YoutubeLink::findOrFail($id);
        $youtube->update($request->all());
        return redirect()->route('youtube.index')->with('success', 'Youtube Link Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $youtube = YoutubeLink::findOrFail($id);
        $youtube->delete();
        return redirect()->route('youtube.index')->with('success', 'Youtube Link Deleted successfully');


    }
}
