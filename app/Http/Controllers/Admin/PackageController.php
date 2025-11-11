<?php

namespace App\Http\Controllers\Admin;

use App\Models\Departure;
use File;
use App\Models\Package;
use App\Models\Activity;
use App\Models\PackageFaq;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ItenaryPackage;
use App\Models\ActivityPackage;
use App\Models\PackageActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DestinationPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::oldest('name')->paginate(20);
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = Destination::where('parent_id', 0)->get();
        $activities = Activity::where('parent_id', 0)->get();
        $destinationPackages = [];
        $activityPackages = [];
        $departures = Departure::all();
        return view('admin.package.create', compact('destinations', 'activities', 'destinationPackages', 'activityPackages','departures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $package =  Package::create($input);
        $package->update(['slug' => Str::slug($request->name)]);

        //itinenary
        foreach ($request->addmore as $key => $value) {
            if ($value['title'] && $value['description']) {
                ItenaryPackage::create([
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'package_id' => $package->id,
                ]);
            }
        }

        //faq
        foreach ($request->addmorefaq as $key => $faq) {
            if ($faq['title'] && $faq['description']) {
                PackageFaq::create([
                    'title' => $faq['title'],
                    'description' => $faq['description'],
                    'package_id' => $package->id,
                ]);
            }
        }

        //attach inclusion
        $package->destinations()->attach($request->destination);
        $package->category()->attach($request->category);

        //activities
        PackageActivity::updateOrCreate(
            [
                'package_id'   => $package->id,
            ],
            $request->all()
        );

        return redirect()->route('packages.edit', $package->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        $destinations = Destination::where('parent_id', 0)->get();
        $activities = Activity::where('parent_id', 0)->get();
        $packageItenary = $package->itenaries;
        $packageFaqs = $package->faqs;

        $destinationPackages = DestinationPackage::where('package_id', $package->id)->pluck('destination_id')->toArray();
        $activityPackages = ActivityPackage::where('package_id', $package->id)->pluck('activity_id')->toArray();
        $packageActivities = PackageActivity::where('package_id', $package->id)->first();
        $departures = Departure::all();
        return view('admin.package.edit', compact('package', 'destinations', 'activities', 'packageItenary', 'packageFaqs', 'destinationPackages', 'packageActivities', 'activityPackages','departures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Package $package)
    {
        $input = $request->all();

        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $package->update($input);

        //itinenary
        $package->itenaries()->delete();
        foreach ($request->addmore as $key => $value) {
            if ($value['title'] && $value['description']) {
                ItenaryPackage::create([
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'package_id' => $package->id,
                ]);
            }
        }

        //faqs
        $package->faqs()->delete();
        foreach ($request->addmorefaq as $key => $faq) {
            if ($faq['title'] && $faq['description']) {
                PackageFaq::create([
                    'title' => $faq['title'],
                    'description' => $faq['description'],
                    'package_id' => $package->id,
                ]);
            }
        }

        $package->destinations()->detach();
        $package->destinations()->attach($request->destination);

        $package->category()->detach();
        $package->category()->attach($request->category);

        //activities
        PackageActivity::updateOrCreate(
            [
                'package_id'   => $package->id,
            ],
            $request->all()
        );
        return redirect()->route('packages.edit', $package->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        $package->itenaries()->delete();
        $package->faqs()->delete();
        $package->destinations()->detach();
        $package->activity()->delete();

        return redirect()->route('packages.index')->with('message', 'Delete Successfully');
    }

    public function repli($pkid)
    {
        $packages = Package::find($pkid);

        $packagefaq = PackageFaq::where('package_id', $pkid)->get();
        $packageact = PackageActivity::where('package_id', $pkid)->get();
        $packageiti = ItenaryPackage::where('package_id', $pkid)->get();
        $packagecats = ActivityPackage::where('package_id', $pkid)->get();
        $packagedests = DestinationPackage::where('package_id', $pkid)->get();

        $newPackage = $packages->replicate();
        $newPackage->save();

        $newPackage->update(['name' => $packages->name . '-copy', 'slug' => $packages->slug . '-' . $newPackage->id]);

        if ($packagefaq) {
            foreach ($packagefaq as $rfaq) {
                $newfaq = $rfaq->replicate();
                $newfaq->package_id = $newPackage->id;
                $newfaq->save();
            }
        }
        if ($packageact) {
            foreach ($packageact as $ract) {
                $newact = $ract->replicate();
                $newact->package_id = $newPackage->id;
                $newact->save();
            }
        }
        if ($packageiti) {
            foreach ($packageiti as $riti) {
                $newiti = $riti->replicate();
                $newiti->package_id = $newPackage->id;
                $newiti->save();
            }
        }
        if ($packagecats) {
            foreach ($packagecats as $rcats) {
                $newcats = $rcats->replicate();
                $newcats->package_id = $newPackage->id;
                $newcats->save();
            }
        }
        if ($packagedests) {
            foreach ($packagedests as $rdests) {
                $newdests = $rdests->replicate();
                $newdests->package_id = $newPackage->id;
                $newdests->save();
            }
        }
        return redirect()->route('packages.index')->with('message', 'Delete Successfully');
    }

    public function generate($id)
    {
        $package = Package::with(['itenaries', 'faqs', 'activity', 'category'])
            ->findOrFail($id);

        $pdf = Pdf::loadView('frontend.package.pdf', compact('package'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream($package->name . '.pdf');
    }
}
