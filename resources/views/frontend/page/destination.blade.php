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
    @if ($destinations->isNotEmpty())
        <section class="place-section centred pt_100 pb_70">
            <div class="pattern-layer">
                <div class="pattern-1"
                    style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-26.png);"></div>
                <div class="pattern-2"
                    style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-15.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title mb_50">
                    <span class="sub-title">Top Places</span>
                </div>
                <div class="row clearfix">

                    @foreach ($destinations as $packs)
                        <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                            <div class="place-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        {!! get_image($packs->image, '', 'destination') !!}
                                    </figure>
                                    <a class="stretched-link" href="{{ route('destinationsingle', $packs->slug) }}"><span
                                            class="text">{{ $packs->name ?? '' }}</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
