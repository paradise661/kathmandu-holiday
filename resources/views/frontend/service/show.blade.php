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
        'parentname' => 'Services',
        'parentlink' => '/services',
    ])
    <section class="sidebar-page-container pt_120 pb_120">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one pb_25">
                            <div class="inner-box">
                                <figure class="image-box">
                                    {!! get_image($content->image, 'w-100', 'blog') !!}
                                </figure>
                                <div class="lower-content">
                                    <ul class="post-info mb_15">
                                        <li><i class="icon-19"></i>{{ get_the_date($content) }}</li>
                                    </ul>
                                    {!! $content->description ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar ml_20">
                        @if ($services->isNotEmpty())
                            <div class="sidebar-widget post-widget mb_40">
                                <div class="widget-title mb_25">
                                    <h3>Our Services</h3>
                                </div>
                                <div class="post-inner">
                                    @foreach ($services as $blog)
                                        <div class="post">
                                            <figure class="post-thumb">
                                                <a href="{{ route('blogsingle', $blog->slug) }}">
                                                    {!! get_image($blog->image, '', 'sidebar') !!}
                                                </a>
                                            </figure>
                                            <h5><a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name }}</a>
                                            </h5>
                                            <span class="post-date">
                                                <i class="icon-19"></i>{{ get_the_date($blog, 'F d, Y') }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
