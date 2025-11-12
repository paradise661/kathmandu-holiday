@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
    'name' => $content->name ?? '',
    'title' => $content->seo_title ?? $content->name,
    'description' => $content->seo_description ?? '',
    'keyword' => $content->seo_keywords ?? '',
    'schema' => $content->seo_schema ?? '',
    'seoimage' => $content->image ?? '',
    'created_at' => $content->created_at,
    'updated_at' => $content->updated_at,
])
@endsection

@section('content')
                        @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner ?? null,
        'parentname' => '',
        'parentlink' => '',
    ])
                        <section class="contact-info-section pt_50 pb_50 centred">
                            <div class="auto-container">
                                @if ($branches->isNotEmpty())
                                                                                                                                        @php
                                    $headOffice = $branches->where('order', 1)->first();
                                    $otherBranches = $branches->where('order', '>=', 2);
                                                                                                                                        @endphp

                                                                                                                                        @if ($headOffice)
                                                                                                                                            <div class="sec-title mb_20 centred">
                                                                                                                                                <h2>Head Office</h2>
                                                                                                                                            </div>
                                                                                                                                            <div class="row row-shadow">
                                                                                                                                                <div class="col-lg-4 col-md-4 col-sm-4 info-column centred">
                                                                                                                                                    <div class="info-block-one info-block-new">
                                                                                                                                                        <div class="inner-box-two">
                                                                                                                                                            <div class="icon-box"><i class="icon-29"></i></div>
                                                                                                                                                            <h3>Email Address</h3>
                                                                                                                                                            <p><a href="mailto:{{ $headOffice->email ?? '' }}">{{ $headOffice->email ?? '' }}</a>
                                                                                                                                                            </p>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-lg-4 col-md-4 col-sm-4 info-column centred">
                                                                                                                                                    <div class="info-block-one info-block-new">
                                                                                                                                                        <div class="inner-box-two">
                                                                                                                                                            <div class="icon-box"><i class="icon-28"></i></div>
                                                                                                                                                            <h3>Phone Number</h3>
                                                                                                                                                            <p><a href="tel:{{ $headOffice->phone ?? '' }}}">{{ $headOffice->phone ?? '' }}</a>
                                                                                                                                                                (24/7)
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-lg-4 col-md-4 col-sm-4 info-column centred">
                                                                                                                                                    <div class="info-block-one info-block-new">
                                                                                                                                                        <div class="inner-box-two">
                                                                                                                                                            <div class="icon-box"><i class="icon-24"></i></div>
                                                                                                                                                            <h3>Location</h3>
                                                                                                                                                            <p>{{ $headOffice->location ?? '' }}</>

                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        @endif

                                                                                                                                        @if ($otherBranches->isNotEmpty())
                                                                                                                                            <div class="sec-title mb_50 mt-4">
                                                                                                                                                <h2>Our Other Branches</h2>
                                                                                                                                            </div>
                                                                                                                                            <div class="row clearfix">
                                                                                                                                                @foreach ($otherBranches as $branch)
                                                                                                                                                    <div class="col-lg-6 col-md-6 col-sm-12 info-column ">
                                                                                                                                                        <div class="info-block-one d-flex h-100 ">
                                                                                                                                                            <div class="inner-box flex-grow-1">
                                                                                                                                                                <h2 style="color: #005191;">{{ $branch->name }}</h2>
                                                                                                                                                                <div class="d-flex align-items-center gap-2 mt-3">
                                                                                                                                                                    <div class="icon-box2"><i class="icon-24"></i></div>
                                                                                                                                                                    <p><a href="/">{{ $branch->location }}</a></p>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="d-flex align-items-center gap-2 mt-3">
                                                                                                                                                                    <div class="icon-box2"><i class="icon-29"></i></div>
                                                                                                                                                                    <p><a href="mailto:{{ $branch->email }}">{{ $branch->email }}</a></p>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="d-flex align-items-center gap-2 mt-3">
                                                                                                                                                                    <div class="icon-box2"><i class="icon-28"></i></div>
                                                                                                                                                                    <p><a href="tel:{{ $branch->phone }}">{{ $branch->phone }}</a></p>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                @endforeach
                                                                                                                                            </div>
                                                                                                                                        @endif
                                @endif

                            </div>
                        </section>

                        <section class="contact-map-section">
                            <div class="auto-container">
                                <div class="sec-title mb_50 centred">
                                    <span class="sub-title">Head Office </span>
                                    <h2>Map</h2>
                                </div>
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="map-inner">
                                            <iframe src="{{ $setting['site_location_url'] ?? '' }}" frameborder="0"
                                                style="border:0; width: 100%;height:1000px;" allowfullscreen="" aria-hidden="false"
                                                tabindex="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                        <section class="contact-section pt_50 pb_50">
                            <div class="auto-container">
                                <div class="sec-title centred mb_50">
                                    <span class="sub-title">Connect</span>
                                    <h2>Send us Message</h2>
                                </div>
                                <div class="form-inner">
                                    <form class="default-form" id="contact-form">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input id="name" type="text" placeholder="Enter Full Name" name="name" />
                                                <span class="text-danger">
                                                    <span id="name-error"></span>
                                                </span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input id="phone" type="text" name="phone" placeholder="Enter Phone" />
                                                <span class="text-danger">
                                                    <span id="phone-error"></span>
                                                </span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input id="email" type="email" placeholder="Enter Email" name="email" />
                                                <span class="text-danger">
                                                    <span id="email-error"></span>
                                                </span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input id="subject" type="text" name="subject" placeholder="Enter Subject" />
                                                <span class="text-danger">
                                                    <span id="subject-error"></span>
                                                </span>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea id="message" name="message" placeholder="Enter Message"></textarea>
                                                <span class="text-danger">
                                                    <span id="message-error"></span>
                                                </span>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                                <button class="theme-btn btn-one" id="contact_submit" type="submit">
                                                    Send Message <span class="d-none" id="contact-loader"><i
                                                            class="fas fa-sync fa-spin"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
@endsection
