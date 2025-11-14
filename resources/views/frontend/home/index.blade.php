@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
    'name' => $setting['homepage_seo_title'] ?? 'Kathmandu Holiday',
    'title' => $setting['homepage_seo_title'] ?? 'Kathmandu Holiday',
    'description' => $setting['homepage_seo_description'] ?? '',
    'keyword' => $setting['homepage_seo_keywords'] ?? '',
    'schema' => $setting['homepage_seo_schema'] ?? '',
    'seoimage' => $setting['homepage_image'] ?? '',
    'created_at' => '2018-02-26T08:09:15+00:00',
    'updated_at' => '2018-02-26T10:54:05+00:00',
])
@endsection

@section('content')

                    @if ($sliders->isNotEmpty())
                        <section class="banner-section p_relative centred">
                            <div class="banner-carousel owl-theme owl-carousel owl-dots-none owl-nav-none">
                                @foreach ($sliders as $key => $slide)
                                    <div class="slide-item p_relative">
                                        <div class="bg-layer"
                                            style="background-image: url({{ get_media_url($slide->image) }}); height:550px;"></div>
                                        <span class="big-text animation_text_word"></span>
                                        <div class="auto-container">
                                            <a href="{{ $slide->link ?? '' }}" target="blank">
                                                <div class="content-box">
                                                    {{-- <span class="special-text">{{ $slide->name ?? '' }}</span> --}}
                                                    {!! $slide->description ?? '' !!}
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    @if (
        $setting['homepage_description'] ||
        $setting['homepage_image'] ||
        $setting['homepage_image_two'] ||
        $setting['homepage_image_three']
    )
                        <section class="about-section pt_50 pb_50">
                            <div class="pattern-layer"
                                style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-1.png);">
                            </div>
                            <div class="auto-container">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                        <div class="content_block_one">
                                            <div class="content-box mr_60">
                                                {!! $setting['homepage_description'] ?? '' !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                        <div class="image_block_one">
                                            <div class="image-box">
                                                @if ($setting['homepage_image'])
                                                    <figure class="image image-1">
                                                        {!! get_image($setting['homepage_image']) !!}
                                                    </figure>
                                                @endif
                                                @if ($setting['homepage_image_two'])
                                                    <figure class="image image-2">
                                                        {!! get_image($setting['homepage_image_two']) !!}
                                                    </figure>
                                                @endif
                                                @if ($setting['homepage_image_three'])
                                                    <figure class="image image-3">
                                                        {!! get_image($setting['homepage_image_three']) !!}
                                                    </figure>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getWhyusByID($setting['whyus']))
                        <section class="chooseus-section pt_50 pb_50 centred">
                            <div class="auto-container">
                                <div class="sec-title mb_50">
                                    <span class="sub-title">We are best</span>
                                    <h2>Why Choose Travic</h2>
                                </div>
                                <div class="row clearfix">
                                    @foreach (getWhyusByID($setting['whyus']) as $whyus)
                                        <div class="col-lg-3 col-md-6 col-sm-12 chooseus-block">
                                            <div class="chooseus-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                                data-wow-duration="1500ms">
                                                <div class="inner-box">
                                                    <div class="icon-box">
                                                        {!! get_image($whyus->image) !!}
                                                    </div>
                                                    <h3>{{ $whyus->name ?? '' }}</h3>
                                                    {!! $whyus->description ?? '' !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getPackageByID($setting['popularpackage']))
                        <section class="tours-section alternat-2 pt_50 pb_0">
                            <div class="auto-container">
                                <div class="sec-title mb_50">
                                    <span class="sub-title">Popular Packages</span>
                                    <h2>Kailash Tour</h2>
                                </div>
                                <div class="three-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                                    @foreach ($kailash as $packs)
                                        <div class="tours-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image2">
                                                        {!! get_image($packs->image, '', 'category') !!}
                                                    </figure>
                                                </div>
                                                <div class="lower-content">
                                                    @if ($packs->destinations->isNotEmpty())
                                                        @foreach ($packs->destinations as $dest)
                                                            <h6>{{ $dest->name ?? '' }}</h6>
                                                        @endforeach
                                                    @endif
                                                    <h4><a href="{{ route('packagessingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
                                                    </h4>
                                                    @if ($packs->price)
                                                        <h5><span>From - </span>{!! getpackageprice($packs->price, $packs->activity->priceprefix, $packs->activity->priceper) !!}</h5>
                                                    @endif

                                                    @if ($packs->activity->duration)
                                                        <span class="day-time">
                                                            <i class="icon-1"></i>{{ $packs->activity->duration ?? '' }}</span>
                                                    @endif
                                                    <div class="link">
                                                        <a href="{{ route('packagessingle', $packs->slug) }}">Explore more<i
                                                                class="fas fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getActivityByID($setting['activitys']))
                        <section class="category-section pt_50 pb_50 centred">
                            <div class="auto-container">
                                <div class="sec-title mb_50">
                                    <span class="sub-title">Tour Types</span>
                                    <h2>Find Adventure in Life</h2>
                                </div>
                                <div class="category-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                                    @foreach (getActivityByID($setting['activitys']) as $packs)
                                        <div class="category-block-one">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    {!! get_image($packs->image, '', 'category-small') !!}
                                                </figure>
                                                <h4><a
                                                        href="{{ route('activitiessingle', $packs->fullslug) }}">{{ $packs->name ?? '' }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getPackageByID($setting['toppackage']))
                        <section class="pricing-section pt_50 pb_50">
                            <div class="pattern-layer">
                                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                            </div>
                            <div class="auto-container">
                                <div class="sec-title mb_50 centred">
                                    <span class="sub-title">Top Packages</span>
                                    <h2>Adventure & Culture</h2>
                                </div>
                                <div class="inner-container">
                                    <div class="row clearfix">
                                        @foreach ($adventure as $packs)
                                            <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                                                <div class="pricing-block-one">
                                                    <div class="pricing-table">
                                                        <figure class="image-box" sty>
                                                            {!! get_image($packs->image, '', 'category') !!}
                                                        </figure>
                                                        <div class="content-box">
                                                            <h4>
                                                                <a class="stretched-link"
                                                                    href="{{ route('packagessingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getPackageByID($setting['toppackage']))
                        <section class="pricing-section pt_50 pb_50">
                            <div class="pattern-layer">
                                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                            </div>
                            <div class="auto-container">
                                <div class="sec-title mb_50 centred">
                                    <span class="sub-title">Top Packages</span>
                                    <h2>Leisure & Family</h2>
                                </div>
                                <div class="inner-container">
                                    <div class="row clearfix">
                                        @foreach ($leisure as $packs)
                                            <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                                                <div class="pricing-block-one">
                                                    <div class="pricing-table">
                                                        <figure class="image-box" sty>
                                                            {!! get_image($packs->image, '', 'category') !!}
                                                        </figure>
                                                        <div class="content-box">
                                                            <h4>
                                                                <a class="stretched-link"
                                                                    href="{{ route('packagessingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getPackageByID($setting['toppackage']))
                        <section class="pricing-section pt_50 pb_50">
                            <div class="pattern-layer">
                                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                            </div>
                            <div class="auto-container">
                                <div class="sec-title mb_50 centred">
                                    <span class="sub-title">Top Packages</span>
                                    <h2>Trekking</h2>
                                </div>
                                <div class="inner-container">
                                    <div class="row clearfix">
                                        @foreach ($trekking as $packs)
                                            <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                                                <div class="pricing-block-one">
                                                    <div class="pricing-table">
                                                        <figure class="image-box" sty>
                                                            {!! get_image($packs->image, '', 'category') !!}
                                                        </figure>
                                                        <div class="content-box">
                                                            <h4>
                                                                <a class="stretched-link"
                                                                    href="{{ route('packagessingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- @if ($setting['videotitle'] || $setting['videourl'] || $setting['videoimage'])
                        <section class="video-section centred">
                            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
                                style="background-image: url({{ get_media_url($setting['videoimage']) ?? asset('frontend/assets/images/background/video-bg.jpg') }});">
                            </div>
                            <div class="auto-container">
                                <div class="inner-box">
                                    <span class="big-text">{{ $setting['videotitle'] ?? '' }}</span>
                                    @if ($setting['videourl'])
                                        <div class="video-btn">
                                            <a class="lightbox-image" data-caption="" href="{{ $setting['videourl'] ?? '' }}">
                                                <img src="{{ asset('frontend') }}/assets/images/icons/icon-2.png" alt="">
                                                <span class="border-animation border-1"></span>
                                                <span class="border-animation border-2"></span>
                                                <span class="border-animation border-3"></span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                    @endif --}}

                    @if (getDestinationByID($setting['destinations']))
                        <section class="place-section centred pt_50 pb_50">
                            <div class="auto-container">
                                <div class="sec-title mb_50">
                                    <span class="sub-title">Top Places</span>
                                    <h2>Top Visited Places</h2>
                                </div>
                                <div class="row clearfix">
                                    @foreach (getDestinationByID($setting['destinations']) as $packs)
                                        <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                                            <div class="place-block-one">
                                                <div class="inner-box">
                                                    @if ($packs->image)
                                                        <figure class="image-box">
                                                            {!! get_image($packs->image, '', 'destination') !!}
                                                        </figure>
                                                    @endif
                                                    <a class="stretched-link" href="{{ route('destinationsingle', $packs->fullslug) }}">
                                                        <span class="text">{{ $packs->name ?? '' }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    @if (getReviewByID($setting['reviews']))
                        <section class="testimonial-section pt_50 pb_50">
                            <div class="pattern-layer"
                                style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-3.png);"></div>
                            <div class="auto-container">
                                <div class="sec-title centred mb_50">
                                    <span class="sub-title">Testimonials</span>
                                    <h2>Love from our Clients</h2>
                                </div>
                                <div class="two-item-carousel owl-carousel owl-theme dots-style-one nav-style-one">
                                    @foreach (getReviewByID($setting['reviews']) as $review)
                                        <div class="testimonial-block-one">
                                            <div class="inner-box">
                                                <ul class="rating">
                                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                            alt="review-icon">
                                                    </li>
                                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                            alt="review-icon">
                                                    </li>
                                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                            alt="review-icon">
                                                    </li>
                                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                            alt="review-icon">
                                                    </li>
                                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                            alt="review-icon">
                                                    </li>
                                                </ul>
                                                <div class="author-box">
                                                    <figure class="author-thumb"><img
                                                            src="{{ asset('frontend') }}/assets/images/resource/testimonial-1.png"
                                                            alt=""></figure>
                                                    <h3>{{ $review->name ?? '' }}</h3>
                                                    <span class="designation">{{ $review->position ?? '' }}</span>
                                                </div>
                                                {!! $review->description ?? '' !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- @if ($blogs->isNotEmpty())
                        <section class="news-section pt_50 pb_50">
                            <div class="auto-container">
                                <div class="sec-title centred mb_50">
                                    <span class="sub-title">Our Blog</span>
                                    <h2>Get Latest News Update</h2>
                                </div>
                                <div class="row clearfix">
                                    @foreach ($blogs as $key => $blog)
                                        <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                                data-wow-duration="1500ms">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <a href="{{ route('blogsingle', $blog->slug) }}">
                                                            {!! get_image($blog->image, '', 'home-blog') !!}
                                                        </a>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <ul class="post-info mb_15">
                                                            <li><i class="icon-19"></i>{{ get_the_date($blog) }}</li>
                                                        </ul>
                                                        <h3><a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name ?? '' }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif --}}

@endsection
