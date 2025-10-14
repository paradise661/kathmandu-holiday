@extends('layouts.admin.master')
@section('title', 'Website Settings - Kathmandu Holiday')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="card-body p-0">
                    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card card-primary shadow br-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2 nav flex-column gap-2 nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-global-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-global" type="button"
                                            role="tab" aria-controls="v-pills-global"
                                            aria-selected="true">Global</button>
                                        <button class="nav-link text-start" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Homepage</button>
                                    </div>
                                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-global" role="tabpanel"
                                            aria-labelledby="v-pills-global-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="image">Site Main Logo</label>
                                                        <div class="custom-file">
                                                            <a class="feature-modal" data-bs-toggle="modal"
                                                                data-bs-target="#featureModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_main_logo'])
                                                                            @php
                                                                                $feature = get_media(
                                                                                    $settings['site_main_logo'] ?? '',
                                                                                );
                                                                            @endphp
                                                                            @if ($feature)
                                                                                <img id="feature_img"
                                                                                    src="{{ asset($feature->fullurl) }}"
                                                                                    alt="{{ $feature->alt }}">
                                                                            @else
                                                                                <img id="feature_img"
                                                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                    alt="upload-image">
                                                                            @endif
                                                                        @else
                                                                            <img class="custom-width" id="feature_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="feature_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="feature_id" type="hidden"
                                                                name="site_main_logo"
                                                                value="{{ old('site_main_logo', $settings['site_main_logo']) }}">
                                                            @error('image')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="banner">Site Fav Icon</label>
                                                        <div class="custom-file">
                                                            <a class="banner-modal" data-bs-toggle="modal"
                                                                data-bs-target="#bannerModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_fav_icon'])
                                                                            @php
                                                                                $banner = get_media(
                                                                                    $settings['site_fav_icon'] ?? '',
                                                                                );
                                                                            @endphp
                                                                            <img id="banner_img"
                                                                                src="{{ asset($banner->fullurl) }}"
                                                                                alt="{{ $banner->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="banner_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="banner_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="banner_id" type="hidden"
                                                                name="site_fav_icon"
                                                                value="{{ old('site_fav_icon', $settings['site_fav_icon']) }}">
                                                            @error('site_fav_icon')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="footer">Site Footer Logo</label>
                                                        <div class="custom-file">
                                                            <a class="footer-modal" data-bs-toggle="modal"
                                                                data-bs-target="#footerModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_footer_logo'])
                                                                            @php
                                                                                $footer = get_media(
                                                                                    $settings['site_footer_logo'] ?? '',
                                                                                );
                                                                            @endphp
                                                                            <img id="footer_img"
                                                                                src="{{ asset($footer->fullurl) }}"
                                                                                alt="{{ $footer->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="footer_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="footer_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="footer_id" type="hidden"
                                                                name="site_footer_logo"
                                                                value="{{ old('site_footer_logo', $settings['site_footer_logo']) }}">
                                                            @error('site_footer_logo')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="fimage">Site Contact Image</label>
                                                        <div class="custom-file">
                                                            <a class="fimage-modal" data-bs-toggle="modal"
                                                                data-bs-target="#fimageModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_icon_image'])
                                                                            @php
                                                                                $fimage = get_media(
                                                                                    $settings['site_icon_image'] ?? '',
                                                                                );
                                                                            @endphp
                                                                            <img id="fimage_img"
                                                                                src="{{ asset($fimage->fullurl) }}"
                                                                                alt="{{ $fimage->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="fimage_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="fimage_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="fimage_id" type="hidden"
                                                                name="site_icon_image"
                                                                value="{{ old('site_icon_image', $settings['site_icon_image']) }}">
                                                            @error('site_icon_image')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror-
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_information">Site Information</label>
                                                        <textarea class="form-control br-8 siteinfo" name="site_information" rows="4"
                                                            placeholder="Enter Site Information">{{ $settings['site_information'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone">Phone Number</label>
                                                        <input class="form-control br-8" type="tel" name="site_phone"
                                                            value="{{ $settings['site_phone'] }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email">Email</label>
                                                        <input class="form-control br-8" type="email" name="site_email"
                                                            value="{{ $settings['site_email'] }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone_two">Phone Number(2)</label>
                                                        <input class="form-control br-8" type="tel" two
                                                            name="site_phone_two"
                                                            value="{{ $settings['site_phone_two'] }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email_two">Email(2)</label>
                                                        <input class="form-control br-8" type="email" two
                                                            name="site_email_two"
                                                            value="{{ $settings['site_email_two'] }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location">Location</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location" value="{{ $settings['site_location'] }}"
                                                            placeholder="Enter Location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location_url">Location Url</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location_url"
                                                            value="{{ $settings['site_location_url'] }}"
                                                            placeholder="Enter Location Url">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_linkedin">Fixed-departure-title</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_linkedin" value="{{ $settings['site_linkedin'] }}"
                                                            placeholder="Enter linkedin">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_youtube">Fixed-departure-slogan</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_youtube" value="{{ $settings['site_youtube'] }}"
                                                            placeholder="Enter Youtube">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_facebook">Facebook</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_facebook" value="{{ $settings['site_facebook'] }}"
                                                            placeholder="Enter Facebook">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_instagram">Instagram</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_instagram"
                                                            value="{{ $settings['site_instagram'] }}"
                                                            placeholder="Enter Instagram">
                                                    </div>
                                                </div> --}}

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_experiance">Open/Close</label>
                                                        <textarea class="form-control br-8" name="site_experiance" rows="4" placeholder="Enter Site experiance">{{ $settings['site_experiance'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_copyright">Site Copyright</label>
                                                        <textarea class="form-control br-8" name="site_copyright" rows="4" placeholder="Enter Site Copyright">{{ $settings['site_copyright'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                        role="tab" aria-controls="pills-home"
                                                        aria-selected="true">Home</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-profile" type="button" role="tab"
                                                        aria-controls="pills-profile"
                                                        aria-selected="false">Destination</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-activity-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-activity"
                                                        type="button" role="tab" aria-controls="pills-activity"
                                                        aria-selected="false">Activity</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-top-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-top" type="button" role="tab"
                                                        aria-controls="pills-top" aria-selected="false">Top Deals</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-popular-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-popular" type="button" role="tab"
                                                        aria-controls="pills-popular" aria-selected="false">Popular
                                                        Deals</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-hot-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-hot" type="button" role="tab"
                                                        aria-controls="pills-hot" aria-selected="false">Hot Deal</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-review" type="button" role="tab"
                                                        aria-controls="pills-review"
                                                        aria-selected="false">Reviews</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-service-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-service" type="button" role="tab"
                                                        aria-controls="pills-service" aria-selected="false">Why
                                                        Us</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-faq-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-faq" type="button" role="tab"
                                                        aria-controls="pills-faq" aria-selected="false">Faqs</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                    aria-labelledby="pills-home-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3">
                                                                <label for="homepage_title">Enter Homepage Title</label>
                                                                <input class="form-control br-8" type="text"
                                                                    name="homepage_title"
                                                                    value="{{ $settings['homepage_title'] }}"
                                                                    placeholder="Enter Homepage Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3 mt-2">
                                                                    <label for="home">Select Homepage Image</label>
                                                                    <div class="custom-file">
                                                                        <a class="home-modal" data-bs-toggle="modal"
                                                                            data-bs-target="#homeModel"
                                                                            href="javascript:void(0)">
                                                                            <div
                                                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                                <div
                                                                                    class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                                    @if ($settings['homepage_image'])
                                                                                        @php
                                                                                            $home = get_media(
                                                                                                $settings[
                                                                                                    'homepage_image'
                                                                                                ] ?? '',
                                                                                            );
                                                                                        @endphp
                                                                                        <img id="home_img"
                                                                                            src="{{ asset($home->fullurl) }}"
                                                                                            alt="{{ $home->alt }}">
                                                                                    @else
                                                                                        <img class="custom-width"
                                                                                            id="home_img"
                                                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                            alt="upload-image">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-danger d-none"
                                                                            id="home_remove" href="javascript:void(0)"><i
                                                                                class="fa fa-trash"></i>
                                                                            Delete</a>

                                                                        <input class="" id="home_id"
                                                                            type="hidden" name="homepage_image"
                                                                            value="{{ old('homepage_image', $settings['homepage_image']) }}">
                                                                        @error('homepage_image')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3 mt-2">
                                                                    <label for="homeone">Select Homepage Image Two</label>
                                                                    <div class="custom-file">
                                                                        <a class="homeone-modal" data-bs-toggle="modal"
                                                                            data-bs-target="#homeoneModel"
                                                                            href="javascript:void(0)">
                                                                            <div
                                                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                                <div
                                                                                    class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                                    @if ($settings['homepage_image_two'])
                                                                                        @php
                                                                                            $home = get_media(
                                                                                                $settings[
                                                                                                    'homepage_image_two'
                                                                                                ] ?? '',
                                                                                            );
                                                                                        @endphp
                                                                                        <img id="homeone_img"
                                                                                            src="{{ asset($home->fullurl) }}"
                                                                                            alt="{{ $home->alt }}">
                                                                                    @else
                                                                                        <img class="custom-width"
                                                                                            id="homeone_img"
                                                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                            alt="upload-image">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-danger d-none"
                                                                            id="homeone_remove"
                                                                            href="javascript:void(0)"><i
                                                                                class="fa fa-trash"></i>
                                                                            Delete</a>

                                                                        <input class="" id="homeone_id"
                                                                            type="hidden" name="homepage_image_two"
                                                                            value="{{ old('homepage_image_two', $settings['homepage_image_two']) }}">
                                                                        @error('homepage_image_two')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3 mt-2">
                                                                    <label for="hometwo">Select Homepage Image
                                                                        Three</label>
                                                                    <div class="custom-file">
                                                                        <a class="hometwo-modal" data-bs-toggle="modal"
                                                                            data-bs-target="#hometwoModel"
                                                                            href="javascript:void(0)">
                                                                            <div
                                                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                                <div
                                                                                    class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                                    @if ($settings['homepage_image_three'])
                                                                                        @php
                                                                                            $home = get_media(
                                                                                                $settings[
                                                                                                    'homepage_image_three'
                                                                                                ] ?? '',
                                                                                            );
                                                                                        @endphp
                                                                                        <img id="hometwo_img"
                                                                                            src="{{ asset($home->fullurl) }}"
                                                                                            alt="{{ $home->alt }}">
                                                                                    @else
                                                                                        <img class="custom-width"
                                                                                            id="hometwo_img"
                                                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                            alt="upload-image">
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-danger d-none"
                                                                            id="hometwo_remove"
                                                                            href="javascript:void(0)"><i
                                                                                class="fa fa-trash"></i>
                                                                            Delete</a>

                                                                        <input class="" id="hometwo_id"
                                                                            type="hidden" name="homepage_image_three"
                                                                            value="{{ old('homepage_image_three', $settings['homepage_image_three']) }}">
                                                                        @error('homepage_image_three')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3">
                                                                <label for="homepage_description">Enter Homepage
                                                                    Description</label>
                                                                <textarea class="form-control ckeditor br-8" name="homepage_description" rows="4">{{ $settings['homepage_description'] }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3">
                                                                <legend class="float-none w-auto legend-title">Videos
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="videotitle">Enter Video
                                                                                Title</label>
                                                                            <input class="form-control br-8"
                                                                                type="text" name="videotitle"
                                                                                value="{{ $settings['videotitle'] }}"
                                                                                placeholder="Enter Video Title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="videourl">Enter Video URL</label>
                                                                            <input class="form-control br-8"
                                                                                type="url" name="videourl"
                                                                                value="{{ $settings['videourl'] }}"
                                                                                placeholder="Enter Video URL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group mb-3 mt-2">
                                                                            <label for="video">Select Video
                                                                                Image</label>
                                                                            <div class="custom-file">
                                                                                <a class="video-modal"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#videoModel"
                                                                                    href="javascript:void(0)">
                                                                                    <div
                                                                                        class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                                        <div
                                                                                            class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                                            @if ($settings['videoimage'])
                                                                                                @php
                                                                                                    $home = get_media(
                                                                                                        $settings[
                                                                                                            'videoimage'
                                                                                                        ] ?? '',
                                                                                                    );
                                                                                                @endphp
                                                                                                <img id="video_img"
                                                                                                    src="{{ asset($home->fullurl) }}"
                                                                                                    alt="{{ $home->alt }}">
                                                                                            @else
                                                                                                <img class="custom-width"
                                                                                                    id="video_img"
                                                                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                                    alt="upload-image">
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <a class="btn btn-sm btn-danger d-none"
                                                                                    id="video_remove"
                                                                                    href="javascript:void(0)"><i
                                                                                        class="fa fa-trash"></i>
                                                                                    Delete</a>

                                                                                <input class="" id="video_id"
                                                                                    type="hidden" name="videoimage"
                                                                                    value="{{ old('videoimage', $settings['videoimage']) }}">
                                                                                @error('videoimage')
                                                                                    <div class="invalid-feedback"
                                                                                        style="display: block;">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="team_title">Enter Team Title</label>
                                                                <input class="form-control br-8" type="text"
                                                                    name="team_title"
                                                                    value="{{ $settings['team_title'] }}"
                                                                    placeholder="Enter Team Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="blog_title">Enter Blog Title</label>
                                                                <input class="form-control br-8" type="text"
                                                                    name="blog_title"
                                                                    value="{{ $settings['blog_title'] }}"
                                                                    placeholder="Enter Blog Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="team_description">Enter Team
                                                                    Description</label>
                                                                <textarea class="form-control br-8" name="team_description" rows="4">{{ $settings['team_description'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="blog_description">Enter Blog
                                                                    Description</label>
                                                                <textarea class="form-control br-8" name="blog_description" rows="4">{{ $settings['blog_description'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3">
                                                                <legend class="float-none w-auto legend-title">SEO</legend>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_title">Enter Homepage
                                                                                Seo
                                                                                Title</label>
                                                                            <input class="form-control br-8"
                                                                                type="text" name="homepage_seo_title"
                                                                                value="{{ $settings['homepage_seo_title'] }}"
                                                                                placeholder="Enter Homepage Seo Title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_keywords">Enter
                                                                                Homepage
                                                                                Seo Keywords</label>
                                                                            <input class="form-control br-8"
                                                                                type="text"
                                                                                name="homepage_seo_keywords"
                                                                                value="{{ $settings['homepage_seo_keywords'] }}"
                                                                                placeholder="Enter Homepage Seo Keywords">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_description">Enter
                                                                                Homepage
                                                                                Seo
                                                                                Description</label>
                                                                            <textarea class="form-control br-8" name="homepage_seo_description" rows="4">{{ $settings['homepage_seo_description'] }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_schema">Enter Homepage
                                                                                Seo
                                                                                Schema</label>
                                                                            <textarea class="form-control br-8" name="homepage_seo_schema" rows="10">{{ $settings['homepage_seo_schema'] }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                    aria-labelledby="pills-profile-tab" tabindex="0">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Destination
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="destinationtitle">Main
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="destinationtitle"
                                                                                value="{{ $settings['destinationtitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="destinationinfo">Info</label>
                                                                            <textarea class="form-control br-8" name="destinationinfo" rows="4" placeholder="Enter Something ...">{{ $settings['destinationinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="destination">Select Popular
                                                                            Packages</label>
                                                                        <select class="form-control" id="destinations"
                                                                            name="destinations[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($destinations->isNotEmpty())
                                                                                @foreach ($destinations as $pck)
                                                                                    <option value="{{ $pck->id }}"
                                                                                        {{ $settings['destinations'] && in_array($pck->id, $settings['destinations']) ? ' selected' : '' }}>
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-activity" role="tabpanel"
                                                    aria-labelledby="pills-activity-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Activity
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="activitytitle">Main Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="activitytitle"
                                                                                value="{{ $settings['activitytitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="activityinfo">Info</label>
                                                                            <textarea class="form-control br-8" name="activityinfo" rows="4" placeholder="Enter Something ...">{{ $settings['activityinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="activity">Select Popular
                                                                            Packages</label>
                                                                        <select class="form-control" id="activitys"
                                                                            name="activitys[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($activities->isNotEmpty())
                                                                                @foreach ($activities as $pck)
                                                                                    <option
                                                                                        value="{{ $pck->id }}"{{ $settings['activitys'] && in_array($pck->id, $settings['activitys']) ? ' selected' : '' }}>
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-top" role="tabpanel"
                                                    aria-labelledby="pills-top-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Top Packages
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="toppackagetitle">Main Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="toppackagetitle"
                                                                                value="{{ $settings['toppackagetitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="toppackageinfo">Info</label>
                                                                            <textarea class="form-control br-8" name="toppackageinfo" rows="4" placeholder="Enter Something ...">{{ $settings['toppackageinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="toppackage">Select Top Packages</label>
                                                                        <select class="form-control" id="toppackage"
                                                                            name="toppackage[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($packages->isNotEmpty())
                                                                                @foreach ($packages as $pck)
                                                                                    <option
                                                                                        value="{{ $pck->id }}"{{ $settings['toppackage'] && in_array($pck->id, $settings['toppackage']) ? ' selected' : '' }}>
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                                    aria-labelledby="pills-review-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Reviews
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="reviewtitle">Review Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="reviewtitle"
                                                                                value="{{ $settings['reviewtitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="reviewinfo">Review Info</label>
                                                                            <textarea class="form-control br-8" name="reviewinfo" rows="4" placeholder="Enter Something ...">{{ $settings['reviewinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="reviews">Select Reviews</label>
                                                                        <select class="form-control" id="reviews"
                                                                            name="reviews[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($reviews->isNotEmpty())
                                                                                @foreach ($reviews as $rev)
                                                                                    <option
                                                                                        value="{{ $rev->id }}"{{ $settings['reviews'] && in_array($pck->id, $settings['reviews']) ? ' selected' : '' }}>
                                                                                        {{ $rev->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-service" role="tabpanel"
                                                    aria-labelledby="pills-service-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">whyus
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="whyustitle">whyus Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="whyustitle"
                                                                                value="{{ $settings['whyustitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="whyusinfo">whyus Info</label>
                                                                            <textarea class="form-control br-8" name="whyusinfo" rows="4" placeholder="Enter Something ...">{{ $settings['whyusinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="whyus">Select whyus</label>
                                                                        <select class="form-control" id="whyus"
                                                                            name="whyus[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($whyus->isNotEmpty())
                                                                                @foreach ($whyus as $rev)
                                                                                    <option
                                                                                        value="{{ $rev->id }}"{{ $settings['whyus'] && in_array($pck->id, $settings['whyus']) ? ' selected' : '' }}>
                                                                                        {{ $rev->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-popular" role="tabpanel"
                                                    aria-labelledby="pills-popular-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Popular
                                                                    Packages
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="popularpackagetitle">Main
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="popularpackagetitle"
                                                                                value="{{ $settings['popularpackagetitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="popularpackageinfo">Info</label>
                                                                            <textarea class="form-control br-8" name="popularpackageinfo" rows="4" placeholder="Enter Something ...">{{ $settings['popularpackageinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="popularpackage">Select Popular
                                                                            Packages</label>
                                                                        {{-- <select class="form-control" id="popularpackage"
                                                                            name="popularpackage[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($packages->isNotEmpty())
                                                                                @foreach ($packages as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select> --}}
                                                                        <select class="form-control" id="popularpackage"
                                                                            name="popularpackage[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($packages->isNotEmpty())
                                                                                @foreach ($packages as $pck)
                                                                                    <option
                                                                                        value="{{ $pck->id }}"{{ $settings['popularpackage'] && in_array($pck->id, $settings['popularpackage']) ? ' selected' : '' }}>
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-hot" role="tabpanel"
                                                    aria-labelledby="pills-hot-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Hot Deals
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="topdealtitle">Main Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="topdealtitle"
                                                                                value="{{ $settings['topdealtitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="topdealinfo">Info</label>
                                                                            <textarea class="form-control br-8" name="topdealinfo" rows="4" placeholder="Enter Something ...">{{ $settings['topdealinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="topdeals">Select Hot Deals</label>
                                                                        @if ($settings['topdeals'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['topdeals'] as $id)
                                                                                    @php
                                                                                        $footcat = getPackageByID($id);
                                                                                    @endphp

                                                                                    @if ($footcat)
                                                                                        <span
                                                                                            class="badge bg-success">{{ $footcat->name }}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="topdeals"
                                                                            name="topdeals[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($packages->isNotEmpty())
                                                                                @foreach ($packages as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-faq" role="tabpanel"
                                                    aria-labelledby="pills-faq-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">FAQs
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="faqtitle">Main Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="faqtitle"
                                                                                value="{{ $settings['faqtitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="faqinfo">Info</label>
                                                                            <textarea class="form-control br-8" name="faqinfo" rows="4" placeholder="Enter Something ...">{{ $settings['faqinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="faqs">Select FAQs</label>
                                                                        @if ($settings['faqs'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['faqs'] as $id)
                                                                                    @php
                                                                                        $footcat = getFaqByID($id);
                                                                                    @endphp
                                                                                    @if ($footcat)
                                                                                        <span
                                                                                            class="badge bg-success">{{ $footcat->question }}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="faqs"
                                                                            name="faqs[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($faqs->isNotEmpty())
                                                                                @foreach ($faqs as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->question }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footers">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="fa-solid fa-rotate"></i> Update Setting</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function selfChoice(value) {
            var option = new Choices(
                value, {
                    allowHTML: true,
                    removeItemButton: true,
                    fuseOptions: {
                        includeScore: true
                    },
                }
            );

        }
        selfChoice('#popularpackage');
        selfChoice('#topdeals');
        selfChoice('#toppackage');
        selfChoice('#reviews');
        selfChoice('#whyus');
        selfChoice('#destinations');
        selfChoice('#activitys');
        selfChoice('#faqs');
    </script>
@endsection
