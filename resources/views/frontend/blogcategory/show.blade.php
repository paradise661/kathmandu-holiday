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
        'parentname' => 'Categories',
        'parentlink' => '/categories',
    ])
    @if (!empty($content->image || $content->description))
        <section class="single-content mt-48">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="img-landscape">
                            {!! get_image($content->image, '', 'activity') !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {!! $content->description ?? '' !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($subcategories->isNotEmpty())
        <section class="single-visit mt-72">
            <div class="container">
                <div class="row">
                    @foreach ($subcategories as $packs)
                        <div class="col-md-3 col-sm-12">
                            <div class="card-visit mt-24">
                                <div class="img-portrait">
                                    {!! get_image($packs->image) !!}
                                </div>
                                <div class="content text-white">
                                    <h4 class="fw-bold">{{ $packs->name ?? '' }}</h4>
                                    <div class="d-flex align-items-center mt-24">
                                        <p>{!! stripLetters($packs->description, 95, '...') !!}</p>
                                        <a class="btn fw-dark stretched-link"
                                            href="{{ route('categorysingle', $packs->slug) }}">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if ($blogs->isNotEmpty())
        <section class="single-visit mt-72">
            <div class="container">
                <h3 class="text-secondary">Popular Posts</h3>
                <div class="row">
                    @foreach ($blogs as $packs)
                        <div class="col-md-3 col-sm-12">
                            <div class="card-visit mt-24">
                                <div class="img-portrait">
                                    {!! get_image($packs->image, '', 'category') !!}
                                </div>
                                <div class="content text-white">
                                    <h4 class="fw-bold">{{ $packs->name ?? '' }}</h4>
                                    <div class="d-flex align-items-center mt-24">
                                        <p>{!! stripLetters($packs->description, 95, '...') !!}</p>
                                        <a class="btn fw-dark stretched-link"
                                            href="{{ route('blogsingle', $packs->slug) }}">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
