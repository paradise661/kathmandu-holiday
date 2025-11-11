<?php

namespace App\Http\Controllers;

use App\Models\YoutubeLink;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\News;
use App\Models\Page;
use App\Models\Member;
use App\Models\Review;
use App\Models\Counter;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Sliders;
use App\Models\Activity;
use App\Models\Services;
use App\Models\Destination;
use App\Models\Blogcategory;
use App\Models\Branch;
use App\Models\Departure;
use App\Models\Download;
use App\Models\PackageActivity;

class FrontendController extends Controller
{
    public function home()
    {
        //Sliders
        $sliders = Sliders::oldest('order')->get();
        $partners = Partner::where('status', 1)->oldest('order')->get();
        $blogs = News::where('status', 1)->limit(3)->get();

        return view('frontend.home.index', compact(['sliders', 'partners', 'blogs']));
    }

    public function download()
    {
        $download = Download::where('status', 1)->oldest('order')->get();
        return view('frontend.page.download', compact('download'));
    }

    public function pagesingle($slug)
    {
        $content = Page::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            if ($content->template == 1) {

                return view('frontend.page.side', compact('content'));
            } elseif ($content->template == 2) {

                $reviews = Review::whereStatus(1)->oldest('order')->limit(4)->get();
                $teams = Member::whereStatus(1)->oldest('order')->limit(4)->get();
                $counters = Counter::oldest('order')->get();
                $mfc = Page::where('status', 1)->where('id', 13)->first();
                return view('frontend.page.about', compact(['content', 'teams', 'reviews', 'counters', 'mfc']));
            } elseif ($content->template == 3) {

                $teams = Member::whereStatus(1)->oldest('order')->get();
                return view('frontend.page.team', compact(['content', 'teams']));
            } elseif ($content->template == 4) {

                $reviews = Review::whereStatus(1)->oldest('order')->get();
                return view('frontend.page.review', compact(['content', 'reviews']));
            } elseif ($content->template == 5) {

                $faqs = Faq::whereStatus(1)->oldest('order')->get();
                return view('frontend.page.faq', compact(['content', 'faqs']));
            } elseif ($content->template == 6) {

                $partners = Partner::where('status', 1)->oldest('order')->get();
                return view('frontend.page.partner', compact(['content', 'partners']));
            } elseif ($content->template == 9) {

                $branches = Branch::oldest('order')->get();
                return view('frontend.page.contact', compact('content', 'branches'));
            } elseif ($content->template == 10) {

                $blogs = News::whereStatus(1)->latest()->get();
                $categorys = Blogcategory::where('status', 1)->where('parent_id', 0)->limit(5)->get();
                return view('frontend.page.blog', compact('content', 'blogs', 'categorys'));
            } elseif ($content->template == 11) {

                $services = Services::where('status', 1)->get();
                return view('frontend.page.service', compact(['content', 'services']));
            } elseif ($content->template == 14) {

                $packages = Package::where('status', 1)->latest()->get();

                return view('frontend.page.package', compact(['content', 'packages']));
            } elseif ($content->template == 15) {

                $categorys = Activity::where('status', 1)->where('parent_id', 0)->oldest('order')->get();
                return view('frontend.page.category', compact(['content', 'categorys']));
            } elseif ($content->template == 13) {

                return view('frontend.page.gallery', compact(['content']));
            } elseif ($content->template == 16) {

                $all_blogs = News::whereStatus(1)->get();
                $all_pages = Page::where('status', 1)->get();
                $all_cats = Activity::where('status', 1)->get();
                $all_packs = Package::where('status', 1)->get();
                $all_destination = Destination::where('status', 1)->get();
                $all_blog_cats = BlogCategory::where('status', 1)->get();
                $all_servs = Services::where('status', 1)->get();
                return response()->view('frontend.page.sitemap', compact(['all_blogs', 'all_pages', 'all_cats', 'all_packs', 'all_destination', 'all_blog_cats', 'all_servs']))->header('Content-Type', 'text/xml');
            } elseif ($content->template == 17) {

                $destinations = Destination::where('parent_id', 0)->oldest('order')->get();
                return view('frontend.page.destination', compact('content', 'destinations'));
            } elseif ($content->template == 19) {

                $categorys = BlogCategory::where('status', 1)->where('parent_id', 0)->oldest('order')->paginate(12);
                return view('frontend.page.blogcategory', compact(['content', 'categorys']));
            } elseif ($content->template == 20) {

                $departure = Departure::where('status', 1)->latest()->paginate(12);
                return view('frontend.page.departure', compact(['content', 'departure']));
            } elseif ($content->template == 21) {
                $youtube = YoutubeLink::paginate(10);
                return view('frontend.page.youtube',compact(['content','youtube']));
            } else {
                $blogs = News::where('status', 1)->limit(5)->get();
                $categorys = Blogcategory::where('status', 1)->limit(5)->get();
                $packages = Package::where('status', 1)->limit(5)->get();

                return view(
                    'frontend.page.default',
                    compact(['content', 'blogs', 'categorys', 'packages'])
                );
            }
        } else {
            return view('errors.404');
        }
    }

    public function blogsingle($slug)
    {
        $content = News::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $blogs = News::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            $categorys = Blogcategory::where('status', 1)->limit(5)->get();
            return view('frontend.blog.show', compact(['content', 'blogs', 'categorys']));
        } else {
            return view('errors.404');
        }
    }

    public function servicesingle($slug)
    {
        $content = Services::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $services = Services::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.service.show', compact(['content', 'services']));
        } else {
            return view('errors.404');
        }
    }

    public function packagessingle($slug)
    {
        $content = Package::where('slug', $slug)->with('itenaries', 'category')->first();
        if ($content) {
            $morepackages = Package::where('slug', '!=', $slug)->inRandomOrder()->limit(3)->get();
            $globalinfo = PackageActivity::where('package_id', $content->id)->first();
            return view('frontend.package.show', compact('content', 'morepackages', 'globalinfo'));
        } else {
            return view('errors.404');
        }
    }

    public function destinationsingle($slug)
    {
        $content = Destination::where('slug', $slug)->first();
        if ($content) {
            $subdestinations = Destination::where('parent_id', $content->id)->oldest('order')->get();
            $packages = Package::whereHas('destinations', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->get();
            return view('frontend.destination.show', compact('packages', 'content', 'subdestinations'));
        } else {
            return view('errors.404');
        }
    }

    public function activitiessingle($slug)
    {
        $content = Activity::where('slug', $slug)->first();
        if ($content) {
            $subcategorys = Activity::where('parent_id', $content->id)->oldest('order')->get();
            $packages = Package::whereHas('category', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->get();
            return view('frontend.category.show', compact('packages', 'content', 'subcategorys'));
        } else {
            return view('errors.404');
        }
    }

    public function departuresingle($slug)
    {
        $content = Departure::where('slug', $slug)->first();
        if ($content) {
            return view('frontend.departure.show', compact('content'));
        } else {
            return view('errors.404');
        }
    }

    public function categorysingle($slug)
    {
        $content = Blogcategory::where('slug', $slug)->first();
        if ($content) {
            $subcategories = BlogCategory::where('parent_id', $content->id)->oldest('order')->get();
            $blogs = News::whereHas('blogcategory', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->get();
            return view('frontend.blogcategory.show', compact('content', 'subcategories', 'blogs'));
        } else {
            return view('errors.404');
        }
    }
}
