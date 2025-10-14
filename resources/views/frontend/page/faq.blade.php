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
    @if ($faqs)
        <section class="faq-section pt_120 pb_110">
            <div class="auto-container">
                <div class="sec-title mb_50 centred">
                    <span class="sub-title">General Faqs</span>
                    <h2>Frequently Asked Questions</h2>
                </div>
                <div class="inner-box">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 accordion-column">
                            <ul class="accordion-box">
                                @foreach ($faqs as $key => $fq)
                                    <li class="accordion block{{ $key == 0 ? ' active-block' : '' }}">
                                        <div class="acc-btn{{ $key == 0 ? ' active' : '' }}">
                                            <div class="icon-box"></div>
                                            <h5>{{ $fq->question ?? '' }}</h5>
                                        </div>
                                        <div class="acc-content{{ $key == 0 ? ' current' : '' }}">
                                            <div class="text">
                                                {!! $fq->answer ?? '' !!}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
