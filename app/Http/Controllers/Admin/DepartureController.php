<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Departure;
use App\Models\DepartureItem;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departure = Departure::oldest('name')->paginate(20);
        return view('admin.departure.index', compact('departure'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();

        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);

        $departure =  Departure::create($input);
        $departure->update(['slug' => $slug]);

        //departure items
        foreach ($request->addmoredeparture as $value) {
            if ($value['name'] && $value['date']) {
                DepartureItem::create([
                    'departure_id' => $departure->id,
                    'name' => $value['name'],
                    'date' => $value['date'],
                ]);
            }
        }

        return redirect()->route('departure.edit', $departure->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Departure $departure)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departure $departure)
    {
        return view('admin.departure.edit', compact('departure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Departure $departure)
    {
        $input = $request->all();
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $departure->update($input);

        //departure items
        $departure->items()->delete();
        foreach ($request->addmoredeparture as $value) {
            if ($value['name'] && $value['date']) {
                DepartureItem::create([
                    'departure_id' => $departure->id,
                    'name' => $value['name'],
                    'date' => $value['date']
                ]);
            }
        }

        return redirect()->route('departure.edit', $departure->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departure $departure)
    {
        $departure->delete();
        $departure->items()->delete();
        return redirect()->route('departure.index')->with('message', 'Delete Successfully');
    }
}
