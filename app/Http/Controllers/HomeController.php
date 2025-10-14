<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Download;
use App\Models\Faq;
use App\Models\Member;
use App\Models\News;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Services;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contacts::all();
        $posts = News::all();
        $pages = Page::all();
        $reviews = Review::all();
        $services = Services::all();
        $teams = Member::all();
        $partners = Partner::all();
        $faqs = Faq::all();
        return view('admin.dashboard', compact(['contacts', 'posts', 'pages', 'reviews', 'services', 'teams', 'partners', 'faqs']));
    }
}
