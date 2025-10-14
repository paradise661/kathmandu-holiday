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
    @if ($categorys->isNotEmpty())
        <section class="pricing-section tour-page-four pt_120 pb_120">
            <div class="pattern-layer">
                <div class="pattern-3"
                    style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-26.png);"></div>
                <div class="pattern-4"
                    style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-15.png);"></div>
            </div>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        @foreach ($categorys as $packs)
                            <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                                <div class="pricing-block-one">
                                    <div class="pricing-table">
                                        <figure class="image-box">
                                            {!! get_image($packs->image, '', 'category') !!}
                                        </figure>
                                        <div class="content-box">
                                            <h4>
                                                <a class="stretched-link"
                                                    href="{{ route('activitiessingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
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
@endsection
