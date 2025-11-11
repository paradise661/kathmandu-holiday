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
<style>

    .text-box .description {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 10; /* show only 10 lines */
    -webkit-box-orient: vertical;
    transition: all 0.3s ease;
}

.text-box .description.expanded {
    -webkit-line-clamp: unset;
}

.read-more-btn {
    display: inline-block;
    margin-top: 10px;
    color: #007bff;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
}

.read-more-btn:hover {
    text-decoration: underline;
}

</style>
@endsection

@section('content')

    @include('frontend.global.banner', [
    'name' => $content->name,
    'banner' => $content->banner ?? null,
    'parentname' => 'Destinations',
    'parentlink' => '/destinations',
])
    @if (!empty($content->image || $content->description))
        <section class="destination-details pt_80 pb_40">
            <div class="auto-container">
                <div class="lower-content">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
                                <div class="sec-title mb_30">
                                    <span class="sub-title">About {{ $content->name }}</span>
                                </div>
                                {{-- <div class="text-box">
                                    {!! $content->description ?? '' !!}
                                </div> --}}
                                <div class="text-box position-relative">
                                    <div class="description short-text">
                                    {!! $content->description ?? '' !!}
                                    </div>
                                    <a href="javascript:void(0);" class="read-more-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                            <div class="map-inner">
                                <figure class="image">
                                    {!! get_image($content->image, '', 'sideview') !!}
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($packages->isNotEmpty())
        <section class="tour-page-five-section p_relative pt_40 pb_80">
            <div class="pattern-layer">
                <div class="pattern-1"
                    style="background-image: url({{ asset('frontend') }}assets/images/shape/shape-26.png);"></div>
                <div class="pattern-2"
                    style="background-image: url({{ asset('frontend') }}assets/images/shape/shape-15.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title mb_50">
                    <span class="sub-title">Popular Packages</span>
                </div>
                <div class="row clearfix">
                    @foreach ($packages as $packs)
                        <div class="col-lg-3 col-md-6 col-sm-12 tours-block">
                            <div class="tours-block-one">
                                <div class="inner-box">
                                    <a class="stretched-link" href="{{ route('packagessingle', $packs->slug) }}">
                                        <div class="image-box">
                                            <figure class="image">
                                                {!! get_image($packs->image, '', 'package') !!}
                                            </figure>
                                        </div>
                                        <div class="lower-content">
                                            @if ($packs->destination)
                                                <h6>{{ $packs->destination->name }}</h6>
                                            @endif
                                            <h4>
                                                <a class="stretched-link"
                                                    href="{{ route('packagessingle', $packs->slug) }}">{{ $packs->name ?? '' }}</a>
                                            </h4>
                                            @if ($packs->price)
                                                <h5><span>From - </span>{!! getpackageprice($packs->price, $packs->activity->priceprefix, $packs->activity->priceper) !!}</h5>
                                            @endif
                                            @if ($packs->activity->duration)
                                                <span class="day-time">
                                                    <i class="icon-1"></i>{{ $packs->activity->duration ?? '' }}
                                                </span>
                                            @endif
                                            <div class="link">
                                                <a class="stretched-link"
                                                    href="{{ route('packagessingle', $packs->slug) }}">Explore
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const readMoreBtn = document.querySelector('.read-more-btn');
    const desc = document.querySelector('.description');

    if (readMoreBtn && desc) {
        readMoreBtn.addEventListener('click', function() {
            desc.classList.toggle('expanded');
            this.textContent = desc.classList.contains('expanded') ? 'Read Less' : 'Read More';
        });
    }
});
</script>

