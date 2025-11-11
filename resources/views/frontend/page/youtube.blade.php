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

                <section class="pricing-section pt_50 pb_50">
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-14.png);"></div>
                        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-15.png);"></div>
                    </div>
                    <div class="auto-container">
                        <div class="sec-title mb_50 centred">
                            <span class="sub-title">Youtube</span>
                            <h2>ALL LINKS</h2>
                        </div>
                        <div class="inner-container">
                    <div class="row clearfix">
                        @foreach ($youtube as $yt)
                                                    <div class="col-lg-3 col-md-6 col-sm-12 video-block mb-4">
                                                        <div class="video-card shadow-sm">
                                                            <div class="video-box">
                                                                {{-- Embed YouTube Video --}}

                                                                <iframe width="100%" height="315"
                                                                        src="{{ str_replace('watch?v=', 'embed/', $yt->url) }}"
                                                                        frameborder="0"
                                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                        allowfullscreen>
                                                                </iframe>

                                                            </div>

                                                            <div class="content-box p-3 text-center">
                                                                <h5 class="fw-bold mb-2">{{ $yt->title ?? 'Untitled' }}{{ $yt->youtube_url }}</h5>
                                                                <p class="text-muted small">
                                                                    {{ \Illuminate\Support\Str::words(strip_tags($yt->description), 15, '...') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                        @endforeach
                    </div>
                </div>

                    </div>
                </section>
@endsection