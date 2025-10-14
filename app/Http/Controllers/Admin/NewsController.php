<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Blogcategory;
use App\Models\CategoryBlog;
use Session;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = News::oldest('name')->paginate(20);
        return view('admin.news.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Blogcategory::where('parent_id', 0)->get();
        $categoryBlogs = [];
        return view('admin.news.create', compact(['categorys', 'categoryBlogs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $blog =  News::create($input);
        $blog->update(['slug' => $slug]);
        $blog->blogcategory()->attach($request->category);

        return redirect()->route('blog.edit', $blog->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $blog)
    {
        $categorys = Blogcategory::where('parent_id', 0)->get();
        $categoryBlogs = CategoryBlog::where('blog_id', $blog->id)->pluck('category_id')->toArray();
        return view('admin.news.edit', compact(['blog', 'categorys', 'categoryBlogs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $blog)
    {
        $input = $request->all();
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $blog->update($input);

        $blog->blogcategory()->detach();
        $blog->blogcategory()->attach($request->category);

        return redirect()->route('blog.edit', $blog->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('message', 'Delete Successfully');
    }
}