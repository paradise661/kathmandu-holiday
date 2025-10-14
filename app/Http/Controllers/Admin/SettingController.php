<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\Member;
use App\Models\Package;
use App\Models\Review;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Whyus;
use Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $settings = Setting::pluck('value', 'key');
        $packages = Package::where('status', 1)->get();
        $reviews = Review::where('status', 1)->get();
        $teams = Member::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        $whyus = Whyus::where('status', 1)->get();
        $destinations = Destination::where('status', 1)->where('parent_id', 0)->get();
        $activities = Activity::where('status', 1)->where('parent_id', 0)->get();
        return view('admin.setting.edit', compact(['settings', 'packages', 'reviews', 'whyus', 'destinations', 'activities', 'teams', 'faqs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $siteSettings = Setting::pluck('value', 'key');

        $siteSetting = $request->all();
        foreach ($siteSetting as $key => $value) {
            $setting->updateOrCreate(['key' => $key,], [
                'key' => $key,
                'value' => $value,
            ]);
        }

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }
}
