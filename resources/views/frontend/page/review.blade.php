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

    @if ($reviews->isNotEmpty())
        <section class="testimonial-style-two white-bg pt_100 pb_90 centred">
            <div class="auto-container">
                <div class="sec-title mb_50">
                    <span class="sub-title">Testimonials</span>
                    <h2>Love from our Clients</h2>
                </div>
                <div class="row">

                    @foreach ($reviews as $key => $value)
                        <div class="col-md-4 mb-4">
                            <div class="testimonial-block-two">
                                <div class="inner-box">
                                    <figure class="thumb-box">
                                        {!! get_image($value->image, '', 'review') !!}
                                    </figure>
                                    <h3>{{ $value->name ?? '' }}</h3>
                                    <span class="designation">{{ $value->position ?? 'Traveler' }}</span>
                                    <ul class="rating">
                                        <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                alt="icon-1">
                                        </li>
                                        <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                alt="icon-1">
                                        </li>
                                        <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                alt="icon-1">
                                        </li>
                                        <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                alt="icon-1">
                                        </li>
                                        <li><img src="{{ asset('frontend') }}/assets/images/icons/icon-1.png"
                                                alt="icon-1">
                                        </li>
                                    </ul>
                                    @if (strlen($value->description) < 400)
                                        <p>{!! $value->description ?? '' !!}</p>
                                    @else
                                        <p>
                                            {!! stripLetters($value->description, 400, '...') !!} <a class="text-primary" data-bs-toggle="modal"
                                                href="#exampleModalToggle-{{ $key }}" role="button">Read More</a>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @foreach ($reviews as $key => $value)
        <div class="modal fade" id="exampleModalToggle-{{ $key }}" aria-hidden="true"
            aria-labelledby="exampleModalToggle-{{ $key }}Label" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-body card-team">
                    <div class="row">
                        <div class="col-md-12 wrap modal-image">
                            <div class="media-wrapper card-team-image">
                                {!! get_image($value->image) !!}
                            </div>
                            <div class="text-center">
                                <h3 class="heading-4 mt-3 text-grey-100">{{ $value->name ?? '' }}</h3>
                                <div class="w-100 text-center mt-2">
                                    <small class="text-center p-1">
                                        {{ $value->position ?? '' }}
                                    </small>
                                </div>
                                <div class="paragraph card-content text-grey-100 text-center mt-3 text-justify">
                                    {!! $value->description ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
