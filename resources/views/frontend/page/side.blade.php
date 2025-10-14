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
    <section class="about-message mt-64">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="img-portrait rounded-circle">
                        {!! get_image($content->image, '', 'about') !!}

                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    {!! $content->description ?? '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
