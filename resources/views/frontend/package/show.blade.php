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
                                                                    <section class="tour-details pt_60 pb_80">
                                                                        <div class="auto-container">
                                                                            @if ($content->gallery)
                                                                                @php
        $gallery = get_show_gallery($content->gallery);
                                                                                @endphp
                                                                                <div class="upper-box pb_30">
                                                                                    <div class="row clearfix">
                                                                                        @if (!empty($gallery[0]))
                                                                                            <div class="col-lg-7 col-md-12 col-sm-12 video-column">
                                                                                                <div class="video-inner"
                                                                                                    style="background-image: url({{ asset(get_media_url($gallery[0], 'gallery-big')) }});">
                                                                                                    <div class="video-btn">
                                                                                                        <a class="lightbox-image" data-fancybox="gallery"
                                                                                                            href="{{ asset(get_media_url($gallery[0])) }}">
                                                                                                            <img src="{{ asset('frontend') }}/assets/images/icons/icon-2.png"
                                                                                                                alt="">
                                                                                                            <span class="border-animation border-1"></span>
                                                                                                            <span class="border-animation border-2"></span>
                                                                                                            <span class="border-animation border-3"></span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif

                                                                                        @php
        $gallery = get_show_gallery($content->gallery);
                                                                                        @endphp
                                                                                        @if (!empty($gallery))
                                                                                            <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                                                                                                <div class="image-box">
                                                                                                    @foreach ($gallery as $key => $g)
                                                                                                        @if ($key != 0 && $key < 3)
                                                                                                            <figure class="image">
                                                                                                                <a class="lightbox-image" data-fancybox="gallery"
                                                                                                                    href="{{ asset(get_media_url($g)) }}">
                                                                                                                    {!! get_image($g, '', 'gallery-small') !!}
                                                                                                                </a>
                                                                                                            </figure>
                                                                                                        @endif
                                                                                                        @if ($key > 2)
                                                                                                            <a class="d-none" data-fancybox="gallery" href="{{ asset(get_media_url($g)) }}">
                                                                                                            </a>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            <div class="tour-details-content">
                                                                                <div class="row clearfix">
                                                                                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                                                                                        <div class="content-box">
                                                                                            <div class="title-box mb_35">
                                                                                                @if ($content->destinations->isNotEmpty())
                                                                                                    <div class="review-box">
                                                                                                        <div class="location-box">
                                                                                                            <div class="icon"><i class="icon-24"></i></div>
                                                                                                            <h6>
                                                                                                                @foreach ($content->destinations as $dest)
                                                                                                                    {{ $dest->name ?? '' }}
                                                                                                                @endforeach
                                                                                                            </h6>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                <div class=" title-section flex row justify-between">
                                                                                                <h2 class="title-head">{{ $content->name ?? '' }}</h2>
                                                                                                <a href="{{ route('package.pdf', $content->id) }}" class="title-head btn print-btn title-head-absolute" target="_blank"><i class="fa fa-print"></i></a>
                                                                                                </div>
                                                                                                <ul class="info-list clearfix">
                                                                                                    @if ($content->price)
                                                                                                        <li>
                                                                                                            <i class="icon-21"></i>
                                                                                                            <span>From</span>
                                                                                                            <h4 class="price">{!! getpackageprice($content->price, $content->activity->priceprefix, $content->activity->priceper) !!}</h4>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if ($content->activity->duration)
                                                                                                        <li>
                                                                                                            <i class="icon-1"></i>
                                                                                                            <span>Duration</span>
                                                                                                            <h4>{{ $content->activity->duration ?? '' }}</h4>
                                                                                                        </li>
                                                                                                    @endif

                                                                                                    @if ($content->activity->priceper)
                                                                                                        <li>
                                                                                                            {{-- <i class="icon-21"></i> --}}
                                                                                                            <i class="fa-solid fa-coins"></i>
                                                                                                            <h5 style="font-weight: 700; font-size:1.15rem;color:black;">TOUR COST </h5>
                                                                                                            <span>Per
                                                                                                                person</span>
                                                                                                            <h4><strong style="font-weight: 600; font-style: italic;">{{ $content->activity->priceper ?? '' }}</strong>
                                                                                                                @if($content->activity->priceperusd) 
                                                                                                                /&nbsp;{{ $content->activity->priceperusd }}
                                                                                                                @endif
                                                                                                            </h4>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    @if ($content->category->isNotEmpty())
                                                                                                        <li>
                                                                                                            <i class="icon-22"></i>
                                                                                                            <span>Tour Type</span>
                                                                                                            <h4>
                                                                                                                @foreach ($content->category as $dest)
                                                                                                                    {{ $dest->name ?? '' }}
                                                                                                                @endforeach
                                                                                                            </h4>
                                                                                                        </li>
                                                                                                    @endif
                                                                                                    {{-- <li>
                                                                                                        <i class="icon-23"></i>
                                                                                                        <span>Min Age</span>
                                                                                                        <h4>6+</h4>
                                                                                                    </li> --}}
                                                                                                </ul>
                                                                                            </div>
                                                                                            @if (
        $content->description ||
        $content->itenaries->isNotEmpty() ||
        $content->map ||
        $content->inclusions ||
        $content->exclusions ||
        $content->overview ||
        $content->faqs->isNotEmpty()
    )
                                                                                                                                                                                                                                                                        <div class="tabs-box">
                                                                                                                                                                                                                                                                            <div class="tab-btn-box p_relative pb_20">
                                                                                                                                                                                                                                                                                <ul class="tab-btns tab-buttons clearfix">
                                                                                                                                                                                                                                                                                    @if ($content->description)
                                                                                                                                                                                                                                                                                        <li class="tab-btn active-btn" data-tab="#tab-1">Overview</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                    @if ($content->itenaries->isNotEmpty())
                                                                                                                                                                                                                                                                                        <li class="tab-btn" data-tab="#tab-2">Tour Plan</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                    @if ($content->map)
                                                                                                                                                                                                                                                                                        <li class="tab-btn" data-tab="#tab-3">Tour Map</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                    @if ($content->inclusions || $content->exclusions)
                                                                                                                                                                                                                                                                                        <li class="tab-btn" data-tab="#tab-4">Inclusion/Exclusion</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                    @if ($content->overview)
                                                                                                                                                                                                                                                                                        <li class="tab-btn" data-tab="#tab-5">Additional Info</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                    @if ($content->faqs->isNotEmpty())
                                                                                                                                                                                                                                                                                        <li class="tab-btn" data-tab="#tab-6">FAQs</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                    @if ($content->departure)
                                                                                                                                                                                                                                                                                        <li class="tab-btn" data-tab="#tab-7">Fixed Departure</li>
                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                </ul>
                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                            <div class="tabs-content">
                                                                                                                                                                                                                                                                                @if ($content->description)
                                                                                                                                                                                                                                                                                    <div class="tab active-tab" id="tab-1">
                                                                                                                                                                                                                                                                                        <div class="overview-inner">
                                                                                                                                                                                                                                                                                            <h3>About this Tour</h3>
                                                                                                                                                                                                                                                                                            <div class="mb_40">
                                                                                                                                                                                                                                                                                                {!! $content->description ?? '' !!}
                                                                                                                                                                                                                                                                                            </div>                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                                @if ($content->departure_date)
                                                                                                                                                                                                                                                                                    <div class="tab" id="tab-7">
                                                                                                                                                                                                                                                                                        <div class="overview-inner">
                                                                                                                                                                                                                                                                                            {{-- @if ($content->departure->items->count())
                                                                                                                                                                                                                                                                                                <h4>Departure Dates</h4>
                                                                                                                                                                                                                                                                                                <div class="departure-items">
                                                                                                                                                                                                                                                                                                    @foreach ($content->departure->items as $item)
                                                                                                                                                                                                                                                                                                        <div class="departure-item mb-2 p-2 border rounded">
                                                                                                                                                                                                                                                                                                            <strong class="d-block">{{ $item->name ?? 'Item Name' }}</strong>
                                                                                                                                                                                                                                                                                                            @if(isset($item->date))
                                                                                                                                                                                                                                                                                                                <span class="text-muted">{{$item->date }}</span>
                                                                                                                                                                                                                                                                                                            @endif
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    @endforeach
                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                            @else
                                                                                                                                                                                                                                                                                                <p>No departure items found.</p>
                                                                                                                                                                                                                                                                                            @endif --}}
                                                                                                                                                                                                                                                                                                 <h4>Departure Dates</h4>
                                                                                                                                                                                                                                                                                                 <div class="departure-items">
                                                                                                                                                                                                                                                                                                    {{ $content->departure_date }}
                                                                                                                                                                                                                                                                                                 </div>

                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>


                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                                @if ($content->itenaries->isNotEmpty())
                                                                                                                                                                                                                                                                                    <div class="tab" id="tab-2">
                                                                                                                                                                                                                                                                                        <div class="tour-plans pb_60 mb_55 border-bottom">
                                                                                                                                                                                                                                                                                            <h3>Tour Plans</h3>
                                                                                                                                                                                                                                                                                            <ul class="accordion-box">
                                                                                                                                                                                                                                                                                                @foreach ($content->itenaries as $key => $faq)
                                                                                                                                                                                                                                                                                                    <li
                                                                                                                                                                                                                                                                                                        class="accordion block{{ $key == 0 ? ' active-block' : '' }}">
                                                                                                                                                                                                                                                                                                        <div class="acc-btn{{ $key == 0 ? ' active' : '' }}">
                                                                                                                                                                                                                                                                                                            <div class="icon-box"></div>
                                                                                                                                                                                                                                                                                                            <span>Day {{ $key + 1 }}</span>
                                                                                                                                                                                                                                                                                                            <h4>{{ $faq->title ?? '' }}</h4>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                        <div class="acc-content{{ $key == 0 ? ' current' : '' }}">
                                                                                                                                                                                                                                                                                                            <div class="text">
                                                                                                                                                                                                                                                                                                                {!! $faq->description ?? '' !!}
                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    </li>
                                                                                                                                                                                                                                                                                                @endforeach
                                                                                                                                                                                                                                                                                            </ul>
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                                @if ($content->map)
                                                                                                                                                                                                                                                                                    <div class="tab" id="tab-3">
                                                                                                                                                                                                                                                                                        <div class="tour-map">
                                                                                                                                                                                                                                                                                            <h3>Tour Map</h3>
                                                                                                                                                                                                                                                                                            <div class="map-inner">
                                                                                                                                                                                                                                                                                                <a data-fancybox="gallery"
                                                                                                                                                                                                                                                                                                    href="{{ asset(get_media($content->map)->fullurl) }}">
                                                                                                                                                                                                                                                                                                    {!! get_image($content->map, 'w-100') !!}
                                                                                                                                                                                                                                                                                                </a>
                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                                @if ($content->inclusions || $content->exclusions)
                                                                                                                                                                                                                                                                                    <div class="tab" id="tab-4">
                                                                                                                                                                                                                                                                                        <div class="tour-map">
                                                                                                                                                                                                                                                                                            <h3>Inclusion/Exclusion</h3>
                                                                                                                                                                                                                                                                                            <div class="list-inner">
                                                                                                                                                                                                                                                                                                <div class="row clearfix">
                                                                                                                                                                                                                                                                                                    @if ($content->inclusions)
                                                                                                                                                                                                                                                                                                        <div class="col-lg-6 col-md-6 col-sm-12 list-column">
                                                                                                                                                                                                                                                                                                            <div class="list-one mb_50 clearfix">
                                                                                                                                                                                                                                                                                                                {!! $content->inclusions ?? '' !!}
                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                                    @if ($content->exclusions)
                                                                                                                                                                                                                                                                                                        <div class="col-lg-6 col-md-6 col-sm-12 list-column">
                                                                                                                                                                                                                                                                                                            <div class="list-two mb_50 clearfix">
                                                                                                                                                                                                                                                                                                                {!! $content->exclusions ?? '' !!}
                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                                @if ($content->overview)
                                                                                                                                                                                                                                                                                    <div class="tab" id="tab-5">
                                                                                                                                                                                                                                                                                        <div class="overview-inner">
                                                                                                                                                                                                                                                                                            <h3>Top Highlights</h3>
                                                                                                                                                                                                                                                                                            <div class="mb_40">
                                                                                                                                                                                                                                                                                                {!! $content->overview ?? '' !!}
                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                                @if ($content->faqs->isNotEmpty())
                                                                                                                                                                                                                                                                                    <div class="tab" id="tab-6">
                                                                                                                                                                                                                                                                                        <div class="tour-plans pb_60 mb_55 border-bottom">
                                                                                                                                                                                                                                                                                            <h3>Frequently Asked Questions</h3>
                                                                                                                                                                                                                                                                                            <ul class="accordion-box">
                                                                                                                                                                                                                                                                                                @foreach ($content->faqs as $key => $faq)
                                                                                                                                                                                                                                                                                                    <li
                                                                                                                                                                                                                                                                                                        class="accordion block{{ $key == 0 ? ' active-block' : '' }}">
                                                                                                                                                                                                                                                                                                        <div class="acc-btn{{ $key == 0 ? ' active' : '' }}">
                                                                                                                                                                                                                                                                                                            <div class="icon-box"></div>
                                                                                                                                                                                                                                                                                                            <span>{{ $key + 1 }}</span>
                                                                                                                                                                                                                                                                                                            <h4>{{ $faq->title ?? '' }}</h4>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                        <div class="acc-content{{ $key == 0 ? ' current' : '' }}">
                                                                                                                                                                                                                                                                                                            <div class="text">
                                                                                                                                                                                                                                                                                                                {!! $faq->title ?? '' !!}
                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    </li>
                                                                                                                                                                                                                                                                                                @endforeach
                                                                                                                                                                                                                                                                                            </ul>
                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                @endif
                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                        </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                                                                                        <div class="tour-sidebar-two ml_20">
                                                                                            <h3>Book this Tour</h3>
                                                                                            <form id="packagebooking">
                                                                                                @csrf
                                                                                                <div class="date-box mb_5 p_relative">
                                                                                                    <div class="icon-box"><i class="icon-10"></i></div>
                                                                                                    <input id="datepicker" type="text" name="date"
                                                                                                        placeholder="Please Select Date" autocomplete="off">
                                                                                                    <small class="text-danger">
                                                                                                        <span id="date-error"></span>
                                                                                                    </small>
                                                                                                </div>
                                                                                                <div class="tickets-box">
                                                                                                    <div class="d-block d-md-flex justify-content-between align-items-center">
                                                                                                        <label>Your Name:</label>
                                                                                                        <div>
                                                                                                            <input id="inputName" type="text" name="name"
                                                                                                                value="{{ old('name') }}" placeholder="Enter Your Name">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <small class="text-danger">
                                                                                                        <span id="name-error"></span>
                                                                                                    </small>
                                                                                                </div>

                                                                                                <div class="tickets-box">
                                                                                                    <div class="d-block d-md-flex justify-content-between align-items-center">
                                                                                                        <label>Your Email:</label>
                                                                                                        <div>
                                                                                                            <input id="inputEmail4" type="email" value="{{ old('email') }}"
                                                                                                                name="email" placeholder="john@doe.com">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <small class="text-danger">
                                                                                                        <span id="email-error"></span>
                                                                                                    </small>
                                                                                                </div>

                                                                                                <div class="tickets-box">
                                                                                                    <div class="d-block d-md-flex justify-content-between align-items-center">
                                                                                                        <label>Your Phone:</label>
                                                                                                        <div>
                                                                                                            <input id="phone" type="text" value="{{ old('phone') }}"
                                                                                                                name="phone" placeholder="984 848 4848">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <small class="text-danger">
                                                                                                        <span id="phone-error"></span>
                                                                                                    </small>
                                                                                                </div>
                                                                                                <div class="tickets-box">
                                                                                                    <div class="d-block d-md-flex justify-content-between align-items-center">
                                                                                                        <label>Your Address:</label>
                                                                                                        <div>
                                                                                                            <input id="inputAddress" type="text" value="{{ old('address') }}"
                                                                                                                name="address" placeholder="1234 Main St">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <small class="text-danger">
                                                                                                        <span id="address-error"></span>
                                                                                                    </small>
                                                                                                </div>
                                                                                                <div class="tickets-box">
                                                                                                    <div class="d-block d-md-flex justify-content-between align-items-center">
                                                                                                        <label class="w-75">No. of People:</label>
                                                                                                        <div class="w-100 text-end">
                                                                                                            <select id="pax" name="numpax" required>
                                                                                                                <option>Select Number</option>
                                                                                                                @for ($i = 2; $i <= 50; $i++)
                                                                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                                                                @endfor
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <small class="text-danger">
                                                                                                        <span id="numpax-error"></span>
                                                                                                    </small>
                                                                                                </div>
                                                                                                <div class="tickets-box d-block mb-3">
                                                                                                    <label>Additional Message</label>
                                                                                                    <textarea class="w-100" id="message" value="{{ old('message') }}" name="message" rows="5"
                                                                                                        placeholder="Enter Message..."></textarea>
                                                                                                </div>
                                                                                                <input type="hidden" name="pckid" value="{{ $packagedetails->id ?? '' }}">
                                                                                                <div class="btn-box">
                                                                                                    <button class="theme-btn btn-one" id="pck-submit" type="submit">Submit<span
                                                                                                            class="d-none" id="loader"><i
                                                                                                                class="fas fa-sync fa-spin"></i></span></button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="social-media-box mt-4">
                                                                                            <h5 class="text-center mb-1">Share Tip:</h5 >
                                                                    @if ($socialdata->isNotEmpty())
                                                                        {{-- <ul class="social-links list-inline d-flex justify-content-center gap-3">
                                                                            <!-- Facebook -->
                                                                            <li>
                                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                                                                   target="_blank" 
                                                                                   class="btn btn-outline-primary rounded-circle px-3 py-2" 
                                                                                   title="Share on Facebook">
                                                                                    <i class="fab fa-facebook-f"></i>
                                                                                </a>
                                                                            </li>

                                                                            <!-- Twitter/X -->
                                                                            <li>
                                                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($content->name ?? 'Check this out!') }}" 
                                                                                   target="_blank" 
                                                                                   class="btn btn-outline-dark rounded-circle px-3 py-2" 
                                                                                   title="Share on X">
                                                                                    <i class="fab fa-x"></i>
                                                                                </a>
                                                                            </li>

                                                                            <!-- LinkedIn -->
                                                                            <li>
                                                                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($content->name ?? 'Check this out!') }}" 
                                                                                   target="_blank" 
                                                                                   class="btn btn-outline-info rounded-circle px-3 py-2" 
                                                                                   title="Share on LinkedIn">
                                                                                    <i class="fab fa-linkedin-in"></i>
                                                                                </a>
                                                                            </li>

                                                                            <!-- WhatsApp -->
                                                                            <li>
                                                                                <a href="https://api.whatsapp.com/send?text={{ urlencode($content->name ?? 'Check this out!') }}%20{{ urlencode(url()->current()) }}" 
                                                                                   target="_blank" 
                                                                                   class="btn btn-outline-success rounded-circle px-3 py-2" 
                                                                                   title="Share on WhatsApp">
                                                                                    <i class="fab fa-whatsapp"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul> --}}
                                                                        <ul class="social-links list-inline d-flex justify-content-center gap-3 mb-0">
            <!-- Facebook -->
            <li class="list-inline-item">
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                 target="_blank" title="Share on Facebook" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>

            <!-- Twitter/X -->
             <li class="list-inline-item">
              <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($content->name ?? 'Check this out!') }}"
                 target="_blank" title="Share on X" class="social-icon twitter">
                <!-- Use fa-x-twitter or fa-twitter depending on Font Awesome version -->
                <i class="fab fa-x"></i>
              </a>
            </li>

            <!-- LinkedIn -->
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($content->name ?? 'Check this out!') }}"
                 target="_blank" title="Share on LinkedIn" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>

            <!-- Google -->
            <li class="list-inline-item">
              <a href="https://plus.google.com/share?url={{ urlencode(url()->current()) }}"
                 target="_blank" title="Share on Google" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </li>

            <!-- WhatsApp -->
            <li class="list-inline-item">
              <a href="https://api.whatsapp.com/send?text={{ urlencode($content->name ?? 'Check this out!') }}%20{{ urlencode(url()->current()) }}"
                 target="_blank" title="Share on WhatsApp" class="social-icon">
                <i class="fab fa-whatsapp"></i>
              </a>
            </li>
          </ul>
                                                                    @endif
                                                                </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                                                                                                </div>
                                                                    
                                                                <div class="auto-container">
                                                                                    <h2 class="mb-2">More Packages</h2>
                                                                    <div class="row clearfix">
                                                                @foreach ($morepackages as $packs)
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 tours-block">
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

@endsection

@section('scripts')
        <script>
            $('#pck-submit').click(function(e) {
                e.preventDefault();

                var packagebookingData = new FormData($('#packagebooking')[0]);
                $('#name-error').html("");
                $('#email-error').html("");
                $('#phone-error').html("");
                $('#address-error').html("");
                $('#numpax-error').html("");
                $('#date-error').html("");

                $.ajax({
                    url: "{{ route('pkbooking') }}",
                    method: 'POST',
                    data: packagebookingData,
                    processData: false,
                    cache: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    success: function(data) {
                        if (data.errors) {
                            if (data.errors.name) {
                                $('#name-error').html(data.errors.name[0]);
                            }
                            if (data.errors.email) {
                                $('#email-error').html(data.errors.email[0]);
                            }
                            if (data.errors.phone) {
                                $('#phone-error').html(data.errors.phone[0]);
                            }
                            if (data.errors.address) {
                                $('#address-error').html(data.errors.address[0]);
                            }
                            if (data.errors.numpax) {
                                $('#numpax-error').html(data.errors.numpax[0]);
                            }
                            if (data.errors.date) {
                                $('#date-error').html(data.errors.date[0]);
                            }
                        }

                        if (data.success) {
                            $('#loader').hide();
                            toastr.success(data.success);
                            $('#packagebooking')[0].reset();
                        }

                    },
                    error: function() {
                        $('#loader').hide();
                        alert("Some Problems Occured");
                    }
                });
            })
        </script>


@endsection
