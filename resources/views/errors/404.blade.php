@extends('layouts.frontend.master')
@section('seo')
    @include('frontend.global.seo', [
        'name' => '404',
        'title' => '404',
        'description' => '404',
        'keyword' => '404',
        'schema' => '404',
        'seoimage' => 'frontend/assets/images/404.png',
        'created_at' => '2023-06-06T08:09:15+00:00',
        'updated_at' => '2023-06-06T10:54:05+00:00',
    ])
@endsection

@section('content')
    <section class="error-section pt_90 pb_160 centred">
        <div class="auto-container">
            <div class="inner-box">
                <figure class="image-box">
                    <img src="{{ asset('frontend/assets/images/icons/error-1.png') }}" alt="404">
                </figure>
                <h2><span>Oops!</span> That Page Can Not be Found.</h2>
                <div class="btn-box">
                    <a class="theme-btn btn-one home-btn" href="javascript: history.back()"><i
                            class="fas fa-long-arrow-left"></i>Go
                        Back</a>
                    <a class="theme-btn btn-one" href="/">Go to Homepage</a>
                </div>
            </div>
        </div>
    </section>
@endsection
