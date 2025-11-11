@extends('layouts.admin.master')
@section('title', 'Edit ' . $page->name . ' - Kathmandu Holiday')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit News - {{ $page->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('page.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('page.update', $page->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id=""
                                            type="text" name="name" value="{{ old('name', $page->name) }}"
                                            placeholder="">
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
                                        <input class="form-control @error('slug') is-invalid @enderror" id=""
                                            type="text" name="slug" value="{{ old('slug', $page->slug) }}"
                                            placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $page->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @if ($page->template == 13)
                                <div class="form-group mb-3">
                                    <label for="gallery">Gallery</label>
                                    <div class="custom-file">
                                        <a class="gallery-modal" data-bs-toggle="modal" data-bs-target="#galleryModel"
                                            href="javascript:void(0)">
                                            <div
                                                class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3 p-3">
                                                <div class="row row-cols-auto gap-2 thumb-image " id="gallerysimg">
                                                    @if ($page->others)
                                                        @php
                                                            $gallery = get_gallery($page->others);
                                                        @endphp
                                                        @if ($gallery)
                                                            @foreach ($gallery as $galls)
                                                                @if ($galls)
                                                                    <div class="col thumbnails media-wrapper d-flex justify-content-center align-items-center border border-secondary-subtle"
                                                                        data-id="{{ $galls->id }}">
                                                                        <img id="gallery_img"
                                                                            src="{{ asset($galls->fullurl) }}"
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
                                        <a class="btn btn-sm btn-danger d-none" id="gallery_remove"
                                            href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                        <input class="" id="gallery_id" type="hidden" name="others"
                                            value="{{ old('others', $page->others) }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title', $page->seo_title) }}" placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description', $page->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords', $page->seo_keywords) }}"
                                        placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $page->seo_schema) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0"
                                        @if ($page->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($page->status == 1) selected @endif
                                        value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Template</label>
                                <select class="form-select ms-5" id="template" name="template">
                                    <option class="p-3" value="0"
                                        @if ($page->template == 0) selected @endif>
                                        Default Template</option>
                                    <option class="p-3"@if ($page->template == 1) selected @endif
                                        value="1">
                                        Side-To-Side</option>
                                    <option class="p-3"@if ($page->template == 2) selected @endif
                                        value="2">
                                        About Us</option>
                                    <option class="p-3"@if ($page->template == 9) selected @endif
                                        value="9">Contact Us</option>
                                    <option class="p-3"@if ($page->template == 14) selected @endif
                                        value="14">All Packages</option>
                                    <option class="p-3"@if ($page->template == 15) selected @endif
                                        value="15">Activities</option>
                                    <option class="p-3"@if ($page->template == 3) selected @endif
                                        value="3">Teams</option>
                                    <option class="p-3"@if ($page->template == 4) selected @endif
                                        value="4">Reviews</option>
                                    <option class="p-3"@if ($page->template == 5) selected @endif
                                        value="5">Faqs</option>
                                    <option class="p-3"@if ($page->template == 6) selected @endif
                                        value="6">Partners</option>
                                    <option class="p-3"@if ($page->template == 10) selected @endif
                                        value="10">Blogs</option>
                                    <option class="p-3"@if ($page->template == 11) selected @endif
                                        value="11">Services</option>
                                    <option class="p-3"@if ($page->template == 13) selected @endif
                                        value="13">Gallery</option>
                                    <option class="p-3"@if ($page->template == 17) selected @endif
                                        value="17">Destinations</option>
                                    <option class="p-3"@if ($page->template == 19) selected @endif
                                        value="19">Blog Category</option>
                                    <option class="p-3"@if ($page->template == 20) selected @endif
                                        value="20">Departure</option>
                                    <option class="p-3"@if ($page->template == 21) selected @endif
                                        value="21">Youtube Links</option>
                                    <option class="p-3"@if ($page->template == 16) selected @endif
                                        value="16">Sitemap</option>
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
                                                @if ($page->banner)
                                                    @php
                                                        $banner = get_media($page->banner ?? '');
                                                    @endphp
                                                    <img id="banner_img" src="{{ asset($banner->fullurl) }}"
                                                        alt="{{ $banner->alt }}">
                                                @else
                                                    <img class="custom-width" id="banner_img"
                                                        src="{{ asset('admin/assets/images/upload.png') }}"
                                                        alt="upload-image">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="banner_remove"
                                        href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="banner_id" type="hidden" name="banner"
                                        value="{{ old('banner', $page->banner) }}">
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
                                                @if ($page->image)
                                                    @php
                                                        $feature = get_media($page->image ?? '');
                                                    @endphp
                                                    @if ($feature)
                                                        <img id="feature_img" src="{{ asset($feature->fullurl) }}"
                                                            alt="{{ $feature->alt }}">
                                                    @else
                                                        <img id="feature_img"
                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                            alt="upload-image">
                                                    @endif
                                                @else
                                                    <img class="custom-width" id="feature_img"
                                                        src="{{ asset('admin/assets/images/upload.png') }}"
                                                        alt="upload-image">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove"
                                        href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $page->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success" href="{{ route('pagesingle', $page->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a>
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
