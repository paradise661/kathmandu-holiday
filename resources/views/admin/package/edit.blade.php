@extends('layouts.admin.master')
@section('title', 'Edit ' . $package->name . ' - Kathmandu Holiday')
@section('content')
    @include('admin.includes.message')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Package "{{ $package->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('packages.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form class="row" method="POST" action="{{ route('packages.update', $package->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id="" type="text"
                                            name="name" value="{{ old('name', $package->name) }}" placeholder="">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-slug">slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" id="" type="text"
                                            name="slug" value="{{ old('slug', $package->slug) }}" placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id=""
                                    name="description" rows="8"
                                    placeholder="">{{ old('description', $package->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id=""
                                    name="short_description" rows="4"
                                    placeholder="">{{ old('short_description', $package->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gallery">Gallery</label>
                                <div class="custom-file">
                                    <a class="gallery-modal" data-bs-toggle="modal" data-bs-target="#galleryModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3 p-3">
                                            <div class="row row-cols-auto gap-2 thumb-image " id="gallerysimg">
                                                @if ($package->gallery)
                                                    @php
    $gallery = get_gallery($package->gallery);
                                                    @endphp
                                                    @if ($gallery)
                                                        @foreach ($gallery as $galls)
                                                            @if ($galls)
                                                                <div class="col thumbnails media-wrapper d-flex justify-content-center align-items-center border border-secondary-subtle"
                                                                    data-id="{{ $galls->id }}">
                                                                    <img id="gallery_img" src="{{ asset($galls->fullurl) }}"
                                                                        alt="{{ $galls->alt }}">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @else
                                                    <div
                                                        class="col thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                        <img class="custom-width" id="gallery_img"
                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                            alt="upload-image">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="gallery_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="gallery_id" type="hidden" name="gallery"
                                        value="{{ old('gallery', $package->gallery) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card card-body my-5 shadow br-8 p-4">
                            <ul class="nav nav-tabs px-4" id="myTab" role="tablist">
                                <li class="nav-item" role="activity">
                                    <button class="nav-link active" id="activity-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-activity" type="button" role="tab" aria-controls="activity"
                                        aria-selected="true">ACTIVITY</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="overview-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-overview" type="button" role="tab" aria-controls="route"
                                        aria-selected="false">USEFUL INFO</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="itinerary-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-itinerary" type="button" role="tab" aria-controls="itinerary"
                                        aria-selected="true">ITINERARY</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="map-tab" data-bs-toggle="tab" data-bs-target="#nav-map"
                                        type="button" role="tab" aria-controls="map" aria-selected="false">MAP</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#nav-faq"
                                        type="button" role="tab" aria-controls="faq" aria-selected="true">FAQs</button>
                                </li>

                                <li class="nav-item" role="inclusion-exclusion">
                                    <button class="nav-link" id="inclusion-exclusion-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-inclusion-exclusion" type="button" role="tab"
                                        aria-controls="inclusion-exclusion"
                                        aria-selected="true">INCLUSION/EXCLUSION</button>
                                </li>

                                <li class="nav-item" role="seo">
                                    <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#nav-seo"
                                        type="button" role="tab" aria-controls="seo" aria-selected="true">SEO</button>
                                </li>
                                <li class="nav-item" role="departure">
                                    <button class="nav-link" id="departure-tab" data-bs-toggle="tab" data-bs-target="#nav-departure" type="button"
                                        role="tab" aria-controls="departure" aria-selected="true">Fixed Departure</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-overview" role="tabpanel"
                                    aria-labelledby="nav-overview-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Useful Info</label>
                                        <textarea class="form-control ckeditor1" id="" name="overview" cols="30"
                                            rows="10"> {{ old('overview', $package->overview) }}</textarea>
                                        @error('overview')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Special Title</label>
                                        <input class="form-control @error('special_title') is-invalid @enderror" id=""
                                            type="text" name="special_title"
                                            value="{{ old('special_title', $package->special_title) }}" placeholder="">
                                        @error('special_title')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Special Info</label>
                                        <textarea class="form-control ckeditor4" id="" name="special" cols="30" rows="10">{{ old('special', $package->special) }}
                                        </textarea>
                                        @error('special')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-itinerary" role="tabpanel"
                                    aria-labelledby="nav-itinerary-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-border" id="dynamicAddRemove" style="width:100%">
                                                <tr>
                                                    <th>Itinerary Content</th>
                                                    <th>Action</th>
                                                </tr>
                                                @if (!$packageItenary->isEmpty())
                                                    @foreach ($packageItenary as $key => $iternary)
                                                        <tr>
                                                            <td style="width: 95%">
                                                                <input class="form-control mb-3" type="text"
                                                                    name="addmore[{{ $key }}][title]"
                                                                    value="{{ $iternary->title }}" />
                                                                <textarea class="form-control editor{{ $key }}" id=""
                                                                    name="addmore[{{ $key }}][description]" cols="20"
                                                                    rows="3">{{ $iternary->description }}</textarea>
                                                            </td>
                                                            <td>
                                                                @if ($key == 0)
                                                                    <button class="btn btn-link" id="add-btn" type="button"
                                                                        name="add"><span
                                                                            class="badge badge-center rounded-pill bg-primary"><i
                                                                                class="fa-solid fa-plus"></i></span></button>
                                                                @else
                                                                    <button class="btn btn-link remove-tr" type="button"><span
                                                                            class="badge badge-center rounded-pill bg-danger"><i
                                                                                class="fa fa-times"></i></span></button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td style="width: 95%">
                                                            <input class="form-control mb-3" type="text"
                                                                name="addmore[0][title]" placeholder="Enter Title" />
                                                            <textarea class="form-control editor0" id=""
                                                                name="addmore[0][description]" cols="20" rows="3"></textarea>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-link" id="add-btn" type="button"
                                                                name="add"><span
                                                                    class="badge badge-center rounded-pill bg-primary"><i
                                                                        class="fa-solid fa-plus"></i></span></button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-map" role="tabpanel" aria-labelledby="nav-map-tab">
                                    <div class="form-group mb-3">
                                        <label for="map">Featured Map</label>
                                        <div class="custom-file">
                                            <a class="map-modal" data-bs-toggle="modal" data-bs-target="#mapModel"
                                                href="javascript:void(0)">
                                                <div
                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                    <div
                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                        @if ($package->map)
                                                            @php
    $map = get_media($package->map ?? '');
                                                            @endphp
                                                            @if ($map)
                                                                <img id="map_img" src="{{ asset($map->fullurl) }}"
                                                                    alt="{{ $map->alt }}">
                                                            @else
                                                                <img id="map_img"
                                                                    src="{{ asset('admin/assets/images/upload.png') }}"
                                                                    alt="upload-image">
                                                            @endif
                                                        @else
                                                            <img class="custom-width" id="map_img"
                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                alt="upload-image">
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="btn btn-sm btn-danger d-none" id="map_remove"
                                                href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                            <input class="" id="map_id" type="hidden" name="map"
                                                value="{{ old('map', $package->map) }}">
                                            @error('map')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-faq" role="tabpanel" aria-labelledby="nav-faq-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-border" id="dynamicAddRemoveFaq" style="width:100%">
                                                <tr>
                                                    <th>Faq Content</th>
                                                    <th>Action</th>
                                                </tr>
                                                @if (!$packageFaqs->isEmpty())
                                                    @foreach ($packageFaqs as $key => $faq)
                                                        <tr>
                                                            <td style="width: 95%">
                                                                <input class="form-control mb-3" type="text"
                                                                    name="addmorefaq[{{ $key }}][title]"
                                                                    value="{{ $faq->title }}" />
                                                                <textarea class="form-control faqeditor{{ $key }}" id=""
                                                                    name="addmorefaq[{{ $key }}][description]" cols="20"
                                                                    rows="3">{{ $faq->description }}</textarea>
                                                            </td>
                                                            <td>
                                                                @if ($key == 0)
                                                                    <button class="btn btn-link" id="add-btn-faq" type="button"
                                                                        name="addfaq"><span
                                                                            class="badge badge-center rounded-pill bg-primary"><i
                                                                                class="fa-solid fa-plus"></i></span></button>
                                                                @else
                                                                    <button class="btn btn-link remove-tr-faq" type="button"><span
                                                                            class="badge badge-center rounded-pill bg-danger"><i
                                                                                class="fa fa-times"></i></span></button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td style="width: 95%">
                                                            <input class="form-control mb-3" type="text"
                                                                name="addmorefaq[0][title]" placeholder="Enter Title" />
                                                            <textarea class="form-control faqeditor0" id=""
                                                                name="addmorefaq[0][description]" cols="20" rows="3"></textarea>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-link" id="add-btn-faq" type="button"
                                                                name="addfaq"><span
                                                                    class="badge badge-center rounded-pill bg-primary"><i
                                                                        class="fa-solid fa-plus"></i></span></button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-inclusion-exclusion" role="tabpanel"
                                    aria-labelledby="nav-inclusion-exclusion-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Inclusion</label>
                                        <textarea class="form-control ckeditor2" id="" name="inclusions" cols="30"
                                            rows="10">{{ old('inclusions', $package->inclusions) }}</textarea>
                                        @error('inclusions')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <label class="form-label mt-2" for="basic-default-fullname">Exclusion</label>
                                        <textarea class="form-control ckeditor3" id="" name="exclusions" cols="30"
                                            rows="10">{{ old('exclusions', $package->exclusions) }}</textarea>
                                        @error('exclusions')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Title</label>
                                        <input class="form-control @error('seo_title') is-invalid @enderror" id=""
                                            type="text" name="seo_title" value="{{ old('seo_title', $package->seo_title) }}"
                                            placeholder="">
                                        @error('seo_title')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Description</label>
                                        <textarea class="form-control @error('seo_description') is-invalid @enderror" id=""
                                            name="seo_description" cols="30"
                                            rows="10">{{ old('seo_description', $package->seo_description) }}</textarea>
                                        @error('seo_description')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Keywords</label>
                                        <input class="form-control @error('seo_keywords') is-invalid @enderror" id=""
                                            type="text" name="seo_keywords"
                                            value="{{ old('seo_keywords', $package->seo_keywords) }}" placeholder="">
                                        @error('seo_keywords')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Schema</label>
                                        <textarea class="form-control @error('seo_schema') is-invalid @enderror" id=""
                                            name="seo_schema"
                                            rows="8">{{ old('seo_schema', $package->seo_schema) }}</textarea>
                                        @error('seo_schema')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-departure" role="tabpanel" aria-labelledby="nav-departure-tab">

                                    <div class="mb-3">
                                        <label class="form-label" for="departure">Departure</label>
                                        {{-- <select name="departure_id" id="departure_id" class="form-control @error('departure_id') is-invalid @enderror">
                                            <option value="">Select Departure</option>
                                            @foreach($departures as $departure)
                                            <option value="{{ $departure->id }}" {{ old('departure_id', isset($package) ? $package->departure_id : '') ==
                                                $departure->id ? 'selected' : '' }}>
                                                {{ $departure->name }}
                                            </option>
                                            @endforeach
                                        </select> --}}
                                        <textarea class="form-control @error('departure_date') is-invalid @enderror" id="" name="departure_date" cols="30"
                                            rows="10">{{ old('departure_date',$package->departure_date) }}</textarea>
                                        @error('departure_date')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="tab-pane fade show active" id="nav-activity" role="tabpanel"
                                    aria-labelledby="nav-activity-tab">
                                    <div class="row mb-3">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Price Prefix:
                                                ($)</label>
                                            <input class="form-control @error('priceprefix') is-invalid @enderror"
                                                type="text" name="priceprefix"
                                                value="{{ old('priceprefix', $packageActivities->priceprefix ?? '') }}">
                                            @error('priceprefix')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Price </label>
                                            <input class="form-control @error('price') is-invalid @enderror" type="text"
                                                name="price" value="{{ old('price', $package->price ?? '') }}">
                                            @error('price')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Per Price:
                                            (/person) INR</label>
                                            <input class="form-control @error('priceper') is-invalid @enderror" type="text"
                                                name="priceper"
                                                value="{{ old('priceper', $packageActivities->priceper ?? '') }}">
                                            @error('priceper')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="basic-default-fullname">Per Price:
                                                (/person) USD</label>
                                            <input class="form-control @error('priceperusd') is-invalid @enderror" type="text" name="priceperusd"
                                                value="{{ old('priceperusd', $packageActivities->priceperusd ?? '') }}">
                                            @error('priceperusd')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Discount(%)</label>
                                            <input class="form-control @error('discount') is-invalid @enderror" type="text"
                                                name="discount" value="{{ old('discount', $package->discount ?? '') }}">
                                            @error('discount')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Location</label>
                                            <input class="form-control @error('location') is-invalid @enderror" type="text"
                                                name="location" value="{{ old('location', $package->location ?? '') }}">
                                            @error('location')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <hr class="shadow-sm">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Duration</label>
                                            <input class="form-control @error('duration') is-invalid @enderror" type="text"
                                                name="duration"
                                                value="{{ old('duration', $packageActivities->duration ?? '') }}">
                                            @error('duration')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Difficulty</label>
                                            <input class="form-control @error('type') is-invalid @enderror" type="text"
                                                name="type" value="{{ old('type', $packageActivities->type ?? '') }}">
                                            @error('type')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Duration Info</label>
                                            <textarea class="form-control br-8"
                                                name="durationinfo">{{ $packageActivities->durationinfo ?? '' }}</textarea>
                                            @error('durationinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Difficulty Info</label>
                                            <textarea class="form-control br-8"
                                                name="typeinfo">{{ $packageActivities->typeinfo ?? '' }}</textarea>
                                            @error('typeinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <hr class="shadow-sm">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Group Size</label>
                                            <input class="form-control @error('size') is-invalid @enderror" type="text"
                                                name="size" value="{{ old('size', $packageActivities->size ?? '') }}">
                                            @error('size')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Transportation</label>
                                            <input class="form-control @error('transportation') is-invalid @enderror"
                                                type="text" name="transportation"
                                                value="{{ old('transportation', $packageActivities->transportation ?? '') }}">
                                            @error('transportation')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Size Info</label>
                                            <textarea class="form-control br-8"
                                                name="sizeinfo">{{ $packageActivities->sizeinfo ?? '' }}</textarea>
                                            @error('sizeinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Transportation
                                                Info</label>
                                            <textarea class="form-control br-8"
                                                name="transportationinfo">{{ $packageActivities->transportationinfo ?? '' }}</textarea>
                                            @error('transportationinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <hr class="shadow-sm">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">activity</label>
                                            <input class="form-control @error('activity') is-invalid @enderror" type="text"
                                                name="activity"
                                                value="{{ old('activity', $packageActivities->activity ?? '') }}">
                                            @error('activity')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Best Season</label>
                                            <input class="form-control @error('season') is-invalid @enderror" type="text"
                                                name="season" value="{{ old('season', $packageActivities->season ?? '') }}">
                                            @error('season')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Activity Info</label>
                                            <textarea class="form-control br-8"
                                                name="activityinfo">{{ $packageActivities->activityinfo ?? '' }}</textarea>
                                            @error('activityinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Best Season
                                                Info</label>
                                            <textarea class="form-control br-8"
                                                name="seasoninfo">{{ $packageActivities->seasoninfo ?? '' }}</textarea>
                                            @error('seasoninfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <hr class="shadow-sm">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Accomodation</label>
                                            <input class="form-control @error('accomod') is-invalid @enderror" type="text"
                                                name="accomod"
                                                value="{{ old('accomod', $packageActivities->accomod ?? '') }}">
                                            @error('accomod')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Meals</label>
                                            <input class="form-control @error('meal') is-invalid @enderror" type="text"
                                                name="meal" value="{{ old('meal', $packageActivities->meal ?? '') }}">
                                            @error('meal')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Accomodation
                                                Info</label>
                                            <textarea class="form-control br-8"
                                                name="accomodinfo">{{ $packageActivities->accomodinfo ?? '' }}</textarea>
                                            @error('accomodinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="basic-default-fullname">Meal Info</label>
                                            <textarea class="form-control br-8"
                                                name="mealinfo">{{ $packageActivities->mealinfo ?? '' }}</textarea>
                                            @error('mealinfo')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card my-3 shadow br-8 p-4">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($package->status == 0) selected @endif>Draft</option>
                                    <option class="p-3" @if ($package->status == 1) selected @endif value="1">Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="banner">Featured Banner</label>
                                <div class="custom-file">
                                    <a class="banner-modal" data-bs-toggle="modal" data-bs-target="#bannerModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($package->banner)
                                                    @php
    $banner = get_media($package->banner ?? '');
                                                    @endphp
                                                    <img id="banner_img" src="{{ asset($banner->fullurl) }}"
                                                        alt="{{ $banner->alt }}">
                                                @else
                                                    <img class="custom-width" id="banner_img"
                                                        src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="banner_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="banner_id" type="hidden" name="banner"
                                        value="{{ old('banner', $package->banner) }}">
                                    @error('banner')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($package->image)
                                                    @php
    $feature = get_media($package->image ?? '');
                                                    @endphp
                                                    @if ($feature)
                                                        <img id="feature_img" src="{{ asset($feature->fullurl) }}"
                                                            alt="{{ $feature->alt }}">
                                                    @else
                                                        <img id="feature_img" src="{{ asset('admin/assets/images/upload.png') }}"
                                                            alt="upload-image">
                                                    @endif
                                                @else
                                                    <img class="custom-width" id="feature_img"
                                                        src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $package->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success" href="{{ route('packagessingle', $package->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a>
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                        @include('admin.package.includes.destinations')
                        @include('admin.package.includes.category')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @if ($packageItenary->isNotEmpty())
            @foreach ($packageItenary as $key => $pck)
                ckeditor("editor{{ $key }}");
            @endforeach
        @else
            ckeditor("editor0");
        @endif
            var i = {{ !$packageItenary->isEmpty() ? array_key_last($packageItenary->toArray()) : 0 }}
            // var i = 0;
            $("#add-btn").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td style="width: 95%"><input type="text" name="addmore[' + i +
                    '][title]" placeholder="Enter Title" class="form-control mb-3" /><textarea name="addmore[' +
                    i +
                    '][description]"  class="form-control editor' + i +
                    '" cols="20" rows="3"></textarea></td><td><button type="button" class="btn btn-link remove-tr"><span class="badge badge-center rounded-pill bg-danger"><i class="fa fa-times"></i></span></button></td></tr>'
                );
                ckeditor('editor' + i);
            });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });

        @if ($packageFaqs->isNotEmpty())
            @foreach ($packageFaqs as $key => $pck)
                ckeditor("faqeditor{{ $key }}");
            @endforeach
        @else
            ckeditor("faqeditor0");
        @endif

            var m = {{ !$packageFaqs->isEmpty() ? array_key_last($packageFaqs->toArray()) : 0 }}
            $("#add-btn-faq").click(function () {
                ++m;
                $("#dynamicAddRemoveFaq").append('<tr><td style="width: 95%"><input type="text" name="addmorefaq[' + m +
                    '][title]" placeholder="Enter Title" class="form-control mb-3" /><textarea name="addmorefaq[' +
                    m +
                    '][description]"  class="form-control faqeditor' + m +
                    '" cols="20" rows="3"></textarea></td><td><button type="button" class="btn btn-link remove-tr-faq"><span class="badge badge-center rounded-pill bg-danger"><i class="fa fa-times"></i></span></button></td></tr>'
                );
                ckeditor('faqeditor' + m);
            });

        $(document).on('click', '.remove-tr-faq', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endsection