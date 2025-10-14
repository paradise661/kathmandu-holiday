<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::where('parent_id', 0)->oldest('name')->paginate(20);
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activitys = Activity::where('parent_id', 0)->get();
        $activityParents = [];
        return view('admin.activities.create', compact(['activitys', 'activityParents']));
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
            $catparent = Activity::whereId($request->parent_id)->first();
            $input['fullslug'] = make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->name);
            $fullslug = make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->name);
        } else {
            $input['fullslug'] = make_slug($request->name);
            $fullslug = make_slug($request->name);
        }

        $activities = Activity::create($input);

        //Unique SLugs
        if (Activity::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $activities->id;
        } else {
            $input['slug'] = $slug;
        }

        if (Activity::where('fullslug', '=', $fullslug)->exists()) {
            $input['fullslug'] = $fullslug . '-' . $activities->id;
        } else {
            $input['fullslug'] = $fullslug;
        }

        $activities->update($input);

        return redirect()->route('activities.edit', $activities->id)->with('success', 'New Activity Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $activitys = Activity::where('parent_id', 0)->get();
        $activityParents = [$activity->parent_id];
        return view('admin.activities.edit', compact(['activity', 'activitys', 'activityParents']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Activity $activity)
    {
        $input = $request->all();

        //Unique SLugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (Activity::where('slug', $slug)->where('id', '!=', $activity->id)->exists()) {
            $input['slug'] = $slug . '-' . $activity->id;
        } else {
            $input['slug'] = $slug;
        }

        if ($request->parent_id) {
            $catparent = Activity::whereId($request->parent_id)->first();
            $fullslug = $request->slug ? make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->slug) : make_slug($catparent->fullslug ?? $catparent->slug . '-' . $request->name);
        } else {
            $fullslug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        }

        if (Activity::where('fullslug', '=', $fullslug)->where('id', '!=', $activity->id)->exists()) {
            $input['fullslug'] = $fullslug . '-' . $activity->id;
        } else {
            $input['fullslug'] = $fullslug;
        }

        $activity->update($input);

        return redirect()->route('activities.edit', $activity->id)->with('success', 'Activity Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        Activity::where('parent_id', $activity->id)->update(['status' => 0, 'parent_id' => 0]);
        $activity->delete();
        return redirect()->route('activities.index')->with('message', 'Delete Successfully');
    }
}
