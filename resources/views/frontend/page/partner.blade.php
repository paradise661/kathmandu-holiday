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

    @if ($partners->isNotEmpty())
        <section class="partners">
            <div class="container pb-90 pt-5">
                <div class="row">
                    <div class="text-center mb-3">
                        <h1 class="h2">Our Partners</h1>
                    </div>
                    @foreach ($partners as $key => $value)
                        <div class="col-md-3 mb-4">
                            <div class="media-wrapper shadow">
                                <a href="{{ $value['url'] && $value['url'] == '#' ? 'javascript:void(0)' : $value['url'] }}"
                                    target="{{ $value['url'] && $value['url'] == '#' ? '_self' : '_blank' }}">
                                    <img src="{{ asset($value['image']) }}" alt="{{ $value['name'] }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
