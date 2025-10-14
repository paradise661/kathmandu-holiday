@extends('layouts.admin.master')
@section('title', 'Edit ' . $departure->name . ' - Kathmandu Holiday')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Departure - {{ $departure->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('departure.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-4">
                <form class="row" method="POST" action="{{ route('departure.update', $departure->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $departure->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $departure->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="route">Routes</label>
                                <textarea class="form-control routeckeditor br-8 @error('route') is-invalid @enderror" id="route" name="route"
                                    rows="10" placeholder="Enter Description">{{ old('route', $departure->route) }}</textarea>
                                @error('route')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($departure->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($departure->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 mt-2">
                                <label for="image">Feature Image</label>
                                <div class="custom-file">
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($departure->image)
                                                    @php
                                                        $feature = get_media($departure->image ?? '');
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
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $departure->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-body mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-border" id="dynamicAddRemove" style="width:100%">
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        @if ($departure->items->isNotEmpty())
                                            @foreach ($departure->items as $key => $dp)
                                                <tr>
                                                    <td style="">
                                                        <input class="form-control mb-2" type="text"
                                                            name="addmoredeparture[{{ $key }}][name]"
                                                            value="{{ $dp->name ?? '' }}" placeholder="Enter name" />
                                                    </td>
                                                    <td style="">
                                                        <input class="form-control mb-2 flatpicker-range" type="text"
                                                            name="addmoredeparture[{{ $key }}][date]"
                                                            value="{{ $dp->date ?? '' }}" placeholder="Enter Date" />
                                                    </td>

                                                    <td>
                                                        @if ($key == 0)
                                                            <button class="btn btn-link" id="add-btn-departure"
                                                                type="button" name="adddeparture"><span
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
                                                <td style="">
                                                    <input class="form-control mb-2" type="text"
                                                        name="addmoredeparture[0][name]" placeholder="Enter Name" />
                                                </td>

                                                <td style="">
                                                    <input class="form-control flatpicker-range mb-2" type="text"
                                                        name="addmoredeparture[0][date]" placeholder="Enter Date" />
                                                </td>
                                                <td>
                                                    <button class="btn btn-link" id="add-btn-departure" type="button"
                                                        name="adddeparture"><span
                                                            class="badge badge-center rounded-pill bg-primary"><i
                                                                class="fa-solid fa-plus"></i></span></button>
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(function() {
            ckeditor('routeckeditor');
        });
        var i = {{ !$departure->items->isEmpty() ? array_key_last($departure->items->toArray()) : 0 }}

        $(document).on('click', '#add-btn-departure', function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<tr><td><input type="text" name="addmoredeparture[' +
                i +
                '][name]" placeholder="Enter Name" class="form-control mb-3" /></td><td><input class="form-control mb-3 flatpicker-range" type="text" name="addmoredeparture[' +
                i +
                '][date]" placeholder="Enter Date"></td><td><button type="button" class="btn btn-link remove-tr"><span class="badge badge-center rounded-pill bg-danger"><i class="fa fa-times"></i></span></button></td></tr>'
            );
            flatpickr(".flatpicker-range", conf)
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
