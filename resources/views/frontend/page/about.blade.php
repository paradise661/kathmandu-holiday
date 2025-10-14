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
    @if ($content->description || $content->image)
        <section class="about-section pt_100 pb_100">
            <div class="pattern-layer-2"
                style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-1.png);">
            </div>
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box mr_60">
                                {!! $content->description ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            {!! get_image($content->image) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (getWhyusByID($setting['whyus']))
        <section class="chooseus-section alternat-2 pt_100 pb_70 centred">
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

    @if ($setting['videotitle'] || $setting['videourl'] || $setting['videoimage'])
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
    @endif

    @if (getReviewByID($setting['reviews']))
        <section class="testimonial-section pt_100 pb_90 white-bg">
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
                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png" alt="review-icon">
                                    </li>
                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png" alt="review-icon">
                                    </li>
                                    <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png" alt="review-icon">
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
@endsection
