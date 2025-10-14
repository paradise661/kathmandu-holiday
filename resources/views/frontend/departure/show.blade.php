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
        'parentname' => 'Departures',
        'parentlink' => '/departures',
    ])
 <section class="tour-details pb_80">
    <div class="auto-container">
        <div class="tour-details-content">
            <div class="row clearfix">
                <div class="col-12 mt-5">
                    <div class="sec-title mb_30 text-center">
                        <h2 class="fw-bold text-depature">{{ $setting['site_linkedin'] }}</h2>
                        <h6 class="mt-2 text-muted">{{ $setting['site_youtube'] }}</h6>
                    </div>

                    <div class="table-responsive shadow rounded-3">
                        <table class="table align-middle table-hover mb-0">
                            <thead class=" departure-table ">
                                <tr>
                                    <th>Name</th>
                                    <th>Kathmandu Arrival Dates</th>
                                    <th style="width: 15%;">Availability</th>
                                    <th style="width: 12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content->items as $item)
                                    <tr>
                                        <td class="fw-semibold">{{ $item->name }}</td>
                                        <td>
                                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                                {{ $item->date }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success px-3 py-2 rounded-pill">Yes</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-book btn-sm rounded-pill px-3" href="#contactsection">
                                                Book Now
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($content->description || $content->image || $content->route)
                    <div class="col-md-7 col-sm-12 content-side mt-4">
                        <div class="content-box p-4 shadow-sm rounded bg-light">
                            {!! $content->description ?? '' !!}
                        </div>
                    </div>
                    <div class="col-md-5 mt-4">
                        @if ($content->image)
                            <figure class="image-box shadow-sm rounded overflow-hidden">
                                {!! get_image($content->image, 'w-100 rounded') !!}
                            </figure>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

    <section class="contact-section pt_50 pb_50" id="contactsection">
        <div class="auto-container">
            <div class="sec-title centred mb_50">
                <span class="sub-title">Connect</span>
                <h2>Send us Message</h2>
            </div>
            <div class="form-inner">
                <form class="default-form" id="contact-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input id="name" type="text" placeholder="Enter Full Name" name="name" />
                            <span class="text-danger">
                                <span id="name-error"></span>
                            </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input id="phone" type="text" name="phone" placeholder="Enter Phone" />
                            <span class="text-danger">
                                <span id="phone-error"></span>
                            </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input id="email" type="email" placeholder="Enter Email" name="email" />
                            <span class="text-danger">
                                <span id="email-error"></span>
                            </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input id="subject" type="text" value="Departure - {{ $content->name }}" name="subject"
                                placeholder="Enter Subject" readonly />
                            <span class="text-danger">
                                <span id="subject-error"></span>
                            </span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea id="message" name="message" placeholder="Enter Message"></textarea>
                            <span class="text-danger">
                                <span id="message-error"></span>
                            </span>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                            <button class="theme-btn btn-one" id="contact_submit" type="submit">
                                Send Message <span class="d-none" id="contact-loader"><i
                                        class="fas fa-sync fa-spin"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
