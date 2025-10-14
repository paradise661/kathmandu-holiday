<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::where('parent_id', 0)->oldest('name')->paginate(20);
        return view('admin.destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = Destination::where('parent_id', 0)->get();
        $destinationParents = [];
        return view('admin.destination.create', compact(['destinations', 'destinationParents']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = $request->parent_id ?? 0;

        $slug = make_slug($request->name);
        if ($request->parent_id) {
            $catparent = Destination::whereId($request->parent_id)->first();
            $input['fullslug'] = make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->name);
            $fullslug = make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->name);
        } else {
            $input['fullslug'] = make_slug($request->name);
            $fullslug = make_slug($request->name);
        }

        $destination = Destination::create($input);

        //Unique SLugs
        if (Destination::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $destination->id;
        } else {
            $input['slug'] = $slug;
        }

        if (Destination::where('fullslug', '=', $fullslug)->exists()) {
            $input['fullslug'] = $fullslug . '-' . $destination->id;
        } else {
            $input['fullslug'] = $fullslug;
        }

        $destination->update($input);

        return redirect()->route('destinations.edit', $destination->id)->with('success', 'New Category Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $destinations = Destination::where('parent_id', 0)->get();
        $destinationParents = [$destination->parent_id];
        return view('admin.destination.edit', compact(['destination', 'destinations', 'destinationParents']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Destination $destination)
    {
        $input = $request->all();

        //Unique SLugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (Destination::where('slug', $slug)->where('id', '!=', $destination->id)->exists()) {
            $input['slug'] = $slug . '-' . $destination->id;
        } else {
            $input['slug'] = $slug;
        }

        if ($request->parent_id) {
            $catparent = Destination::whereId($request->parent_id)->first();
            $fullslug = $request->slug ? make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->slug) : make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->name);
        } else {
            $fullslug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        }

        if (Destination::where('fullslug', '=', $fullslug)->where('id', '!=', $destination->id)->exists()) {
            $input['fullslug'] = $fullslug . '-' . $destination->id;
        } else {
            $input['fullslug'] = $fullslug;
        }

        $destination->update($input);

        return redirect()->route('destinations.edit', $destination->id)->with('success', 'Destination Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        Destination::where('parent_id', $destination->id)->update(['status' => 0, 'parent_id' => 0]);
        $destination->delete();
        return redirect()->route('destinations.index')->with('message', 'Delete Successfully');
    }
}
