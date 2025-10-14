<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Blogcategory;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class BlogcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Blogcategory::where('parent_id', 0)->oldest('name')->paginate(20);
        return view('admin.blogcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Blogcategory::where('parent_id', 0)->get();
        $categoryParents = [];
        return view('admin.blogcategory.create', compact(['categorys', 'categoryParents']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = $request->parent_id ?? 0;

        $slug = Str::slug($request->name);
        $blogcategory = Blogcategory::create($input);

        //Unique SLugs
        if (Blogcategory::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $blogcategory->id;
        } else {
            $input['slug'] = $slug;
        }

        $blogcategory->update($input);

        return redirect()->route('blogcategory.edit', $blogcategory->id)->with('success', 'New Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogcategory)
    {
        $categorys = Blogcategory::where('parent_id', 0)->get();
        $categoryParents = [$blogcategory->parent_id];
        return view('admin.blogcategory.edit', compact(['blogcategory', 'categorys', 'categoryParents']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, BlogCategory $blogcategory)
    {
        $input = $request->all();

        //Unique SLugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (Blogcategory::where('slug', $slug)->where('id', '!=', $blogcategory->id)->exists()) {
            $input['slug'] = $slug . '-' . $blogcategory->id;
        } else {
            $input['slug'] = $slug;
        }

        $blogcategory->update($input);


        return redirect()->route('blogcategory.edit', $blogcategory->id)->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogcategory)
    {
        Blogcategory::where('parent_id', $blogcategory->id)->update(['status' => 0, 'parent_id' => 0]);
        $blogcategory->delete();
        return redirect()->route('blogcategory.index')->with('message', 'Delete Successfully');
    }
}
