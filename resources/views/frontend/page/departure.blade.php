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
    @if ($departure->isNotEmpty())
        <section class="tour-page-five-section p_relative pt_80 pb_80">
            <div class="pattern-layer">
                <div class="pattern-1"
                    style="background-image: url({{ asset('frontend') }}assets/images/shape/shape-26.png);"></div>
                <div class="pattern-2"
                    style="background-image: url({{ asset('frontend') }}assets/images/shape/shape-15.png);"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    @foreach ($departure as $packs)
                        <div class="col-lg-3 col-md-6 col-sm-12 tours-block">
                            <div class="tours-block-one">
                                <div class="inner-box">
                                    <a class="stretched-link" href="{{ route('departuresingle', $packs->slug) }}">
                                        <div class="image-box">
                                            <figure class="image">
                                                {!! get_image($packs->image, '', 'package') !!}
                                            </figure>
                                        </div>
                                        <div class="lower-content">
                                            <h4>
                                                <a class="stretched-link"
                                                    href="{{ route('departuresingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
                                            </h4>
                                            <div class="link">
                                                <a class="stretched-link"
                                                    href="{{ route('departuresingle', $packs->slug) }}">Explore
                                                    more<i class="fas fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
