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
    @if ($teams->isNotEmpty())
        <section class="about-team py-5">
            <div class="container">
                <div class="row mt-24">
                    @foreach ($teams as $key => $value)
                        <div class="col-md-4 col-sm-12 mb-5">
                            <div class="card-team">
                                <div class="media-wrapper text-center">
                                    {!! get_image($value->image, '', 'team') !!}
                                </div>
                                <div class="mt-3 py-2" style="background: #005191">
                                    <h5 class="text-white text-center">{{ $value->name ?? '' }}</h5>
                                    <h6 class="text-white text-center">{{ $value->position ?? '' }}</h6>
                                </div>
                                <div class="mt-3 text-center">
                                    <p>{!! stripLetters($value->description ?? '', 90, '...') !!}<button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#teamModal{{ $key }}" style="background: #005191"
                                            type="button">
                                            Read More
                                        </button></p>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="teamModal{{ $key }}" tabindex="-1"
                            aria-labelledby="teamModalLabel{{ $key }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <button class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal"
                                        type="button" aria-label="Close"></button>
                                    <div class="media-wrapper text-center mt-3">
                                        {!! get_image($value->image, '', 'team') !!}
                                    </div>
                                    <div class="modal-header border-0 d-block">
                                        <h5 class="w-100 text-center">{{ $value->name ?? '' }}</h5>
                                        <h6 class="w-100 text-center">{{ $value->position ?? '' }}</h6>
                                    </div>
                                    <div class="modal-body">
                                        {!! $value->description ?? '' !!}
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
