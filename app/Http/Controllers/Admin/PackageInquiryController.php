<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PackageInquiryController extends Controller
{
    public function index()
    {
        $inquiries = PackageInquiry::latest()->paginate(20);
        return view('admin.packageinquiry.index', compact('inquiries'));
    }

    public function show(PackageInquiry $packageinquiry)
    {
        $package = Package::where('id', $packageinquiry->pckid)->first();
        return view('admin.packageinquiry.show', compact('packageinquiry', 'package'));
    }

    public function destroy(PackageInquiry $packageinquiry)
    {
        $packageinquiry->delete();
        return redirect()->route('packageinquiry.index')->with('message', 'Delete Successfully');
    }

    public function pkbooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'numpax' => 'required',
            'date' => 'required',
        ]);

        if ($validator->passes()) {
            PackageInquiry::create($request->all());
            return Response::json(['success' => 'Thank you, your enquiry has been Submitted Successfully']);
        }

        return Response::json(['errors' => $validator->errors()]);
    }
}
