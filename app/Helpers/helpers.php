<?php

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\News;
use App\Models\Page;
use App\Models\Media;
use App\Models\Whyus;
use App\Models\Member;
use App\Models\Review;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Activity;
use App\Models\Services;
use App\Models\Destination;
use App\Models\MenuLocation;

function getMenus($id)
{
    $nav = MenuLocation::where('location', $id)->first();
    if ($nav) {
        $sitemenu = json_decode($nav->content);
        $sitemenu = $sitemenu[0];
        foreach ($sitemenu as $menu) {
            $menu->title = Menu::where('id', $menu->id)->value('title');
            $menu->name = Menu::where('id', $menu->id)->value('name');
            $menu->slug = Menu::where('id', $menu->id)->value('slug');
            $menu->target = Menu::where('id', $menu->id)->value('target');
            $menu->type = Menu::where('id', $menu->id)->value('type');
            if (!empty($menu->children[0])) {
                foreach ($menu->children[0] as $child) {
                    $child->title = Menu::where('id', $child->id)->value('title');
                    $child->name = Menu::where('id', $child->id)->value('name');
                    $child->slug = Menu::where('id', $child->id)->value('slug');
                    $child->target = Menu::where('id', $child->id)->value('target');
                    $child->type = Menu::where('id', $child->id)->value('type');

                    if (!empty($child->children[0])) {
                        foreach ($child->children[0] as $subchild) {
                            $subchild->title = Menu::where('id', $subchild->id)->value('title');
                            $subchild->name = Menu::where('id', $subchild->id)->value('name');
                            $subchild->slug = Menu::where('id', $subchild->id)->value('slug');
                            $subchild->target = Menu::where('id', $subchild->id)->value('target');
                            $subchild->type = Menu::where('id', $subchild->id)->value('type');

                            if (!empty($subchild->children[0])) {
                                foreach ($subchild->children[0] as $newchild) {
                                    $newchild->title = Menu::where('id', $newchild->id)->value('title');
                                    $newchild->name = Menu::where('id', $newchild->id)->value('name');
                                    $newchild->slug = Menu::where('id', $newchild->id)->value('slug');
                                    $newchild->target = Menu::where('id', $newchild->id)->value('target');
                                    $newchild->type = Menu::where('id', $newchild->id)->value('type');
                                }
                            }
                        }
                    }
                }
            }
        }

        return $sitemenu;
    }
}

function getPages()
{
    return Page::where('status', 1)->orderBy('created_at', 'DESC')->get();
}

function getBlog($limit, $id = '')
{
    return News::where('status', 1)->where('id', '!=', $id)->oldest('created_at')->limit($limit)->get();
}

function getService($limit, $id = '')
{
    return Services::where('status', 1)->where('id', '!=', $id)->oldest('created_at')->limit($limit)->get();
}

function getSettings()
{
    return Setting::pluck('value', 'key')->toArray();
}

function getPagesById($id)
{
    return Page::where('status', 1)->where('id', $id)->first();
}

function getReviewByID($Id)
{
    return $Id ? Review::whereIn('id', $Id)->get() : null;
}

function getServiceByID($Id)
{
    return $Id ? Services::whereIn('id', $Id)->get() : null;
}

function getWhyusByID($Id)
{
    return $Id ? Whyus::whereIn('id', $Id)->get() : null;
}

function getFaqByID($Id)
{
    return $Id ? Faq::whereIn('id', $Id)->get() : null;
}

function getDestinationByID($Id)
{
    return $Id ? Destination::whereIn('id', $Id)->get() : null;
}

function getActivityByID($Id)
{
    return $Id ? Activity::whereIn('id', $Id)->get() : null;
}

function getPackageByID($Id)
{
    return $Id ? Package::whereIn('id', $Id)->get() : null;
}

if (!function_exists('make_slug')) {
    function make_slug($string)
    {
        return Str::slug($string);
    }
}

if (!function_exists('galleryfileUpload')) {
    function galleryfileUpload($request, $name, $foldername)
    {
        $image = '';
        if ($image = $request->file($name)) {

            $image = $request->$name;
            $image_new_name = $name . '-' . date('YmdHis') . '.' . $image->getClientOriginalName();
            $image->move(public_path('storage/' . $foldername . '/'), $image_new_name);

            $image = '/storage/' . $foldername . '/' . $image_new_name;

            return $image;
        }
    }
}

if (!function_exists('removeFile')) {
    function removeFile($file)
    {
        if (File::exists(public_path($file))) {
            File::delete(public_path($file));
        }
    }
}

if (!function_exists('stripLetters')) {
    function stripLetters($text, $number, $last = "")
    {
        if (!empty($text)) {
            return substr(strip_tags(html_entity_decode($text)), 0, $number) . $last;
        }
    }
}

if (!function_exists('image_sizes')) {
    function image_sizes()
    {
        $size = [
            'banner' => ['width' => 1920, 'height' => 600],
            'default' => ['width' => 1290, 'height' => 520],
            'blog' => ['width' => 850, 'height' => 520],
            'gallery-big' => ['width' => 750, 'height' => 500],
            'sideview' => ['width' => 600, 'height' => 535],
            'gallery-small' => ['width' => 514, 'height' => 247],
            'home-package' => ['width' => 410, 'height' => 275],
            'home-blog' => ['width' => 410, 'height' => 250],
            'package' => ['width' => 300, 'height' => 200],
            'category' => ['width' => 315, 'height' => 400],
            'category-small' => ['width' => 300, 'height' => 200],
            'team' => ['width' => 165, 'height' => 165],
            'review' => ['width' => 100, 'height' => 100],
            'sidebar' => ['width' => 90, 'height' => 90],
            'footer-blog' => ['width' => 70, 'height' => 70],
        ];
        return  $size;
    }
}

if (!function_exists('get_image_size')) {
    function get_image_size($size)
    {
        if ($size) {
            $sizes  = image_sizes();
            if (array_key_exists($size, $sizes)) {
                return '-' . $sizes[$size]['width'] . 'x' . $sizes[$size]['height'];
            } else {
                return null;
            }
        }
    }
}

if (!function_exists('get_image')) {
    function get_image($id, $class = "", $size = "")
    {
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            }
        }
    }
}

if (!function_exists('get_banner')) {
    function get_banner($id, $class = "", $size = "")
    {
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            }
        } else {
            return '<img src="' . asset('frontend/assets/images/banner.jpg') . '" alt="Adventure Planner">';
        }
    }
}

if (!function_exists('get_media')) {
    function get_media($id)
    {
        if ($id) {
            return Media::where('id', $id)->first();
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_media_url')) {
    function get_media_url($id, $size = "")
    {
        if ($id) {
            $media = Media::where('id', $id)->first();
            $dimension = $size ? get_image_size($size) : '';
            if ($media) {
                if (file_exists(public_path('storage/' . rawurlencode($media->url) . $dimension . '.' . $media->extention))) {
                    return 'storage/' . rawurlencode($media->url) . $dimension . '.' . $media->extention;
                } else {
                    return $media ? $media->fullurl : Null;
                }
            }
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_gallery')) {
    function get_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = get_media($new);
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_show_gallery')) {
    function get_show_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = $new;
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_the_date')) {
    function get_the_date($data, $format = 'd M, Y')
    {
        if ($data && $data->created_at) {
            return date($format, strtotime($data->created_at));
        }
    }
}
if (!function_exists('get_the_date_diff')) {
    function get_the_date_diff($dateCount)
    {
        if ($dateCount) {
            return Carbon::now()->subDays(now()->diffInDays($dateCount))->longAbsoluteDiffForHumans();
        } else {
            return null;
        }
    }
}

if (!function_exists('getpackageprice')) {
    function getpackageprice($price, $prefix = '', $perperson = '')
    {
        if ($price) {
            $pre = $prefix != '' ? $prefix . ' ' : '₹ ';
            $per = $perperson != '' ? ' ' . $perperson : '';
            $priceresult = $pre . number_format($price) . $per;
            return $priceresult;
        }
    }
}

if (!function_exists('fileUpload')) {
    function fileUpload($request, $name, $foldername)
    {
        $image = '';
        if ($image = $request->file($name)) {

            $image = $request->$name;
            $image_new_name = $name . '-' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/admin/' . $foldername . '/'), $image_new_name);

            $image = '/storage/admin/' . $foldername . '/' . $image_new_name;

            return $image;
        }
    }
}
