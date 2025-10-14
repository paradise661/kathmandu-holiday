@extends('layouts.admin.master')
@section('title', 'Create New Departure - Kathmandu Holiday')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Departure</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('departure.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-4">
                <form class="row" method="POST" action="{{ route('departure.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="route">Routes</label>
                                <textarea class="form-control routeckeditor br-8 @error('route') is-invalid @enderror" id="route" name="route"
                                    rows="10" placeholder="Enter Description">{{ old('route') }}</textarea>
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
                                    <option class="p-3" value="1">Publish</option>
                                    <option class="p-3" value="0">Draft</option>
                                </select>
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
                                                <img class="custom-width" id="feature_img"
                                                    src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>
                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image') }}">
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-plus"></i>
                                    Publish</button>
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
                                        <tr>
                                            <td style="width: 49%">
                                                <input class="form-control mb-3" type="text"
                                                    name="addmoredeparture[0][name]" placeholder="Enter Name" />
                                            </td>
                                            <td style="width:49%">
                                                <input class="form-control mb-3" type="text"
                                                    name="addmoredeparture[0][date]" placeholder="Enter Date" />
                                            </td>
                                            <td>
                                                <button class="btn btn-link" id="add-btn" type="button"
                                                    name="add"><span
                                                        class="badge badge-center rounded-pill bg-primary"><i
                                                            class="fa-solid fa-plus"></i></span></button>
                                            </td>
                                        </tr>
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
        ckeditor("editor0");
        $(function() {
            ckeditor('routeckeditor');
        });

        var i = 0;
        $(document).on('click', '#add-btn', function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td style="width: 49%"><input type="text" name="addmoredeparture[' +
                i +
                '][name]" placeholder="Enter Name" class="form-control mb-3" /></td><td style="width: 49%"><input type="text" name="addmoredeparture[' +
                i +
                '][date]" placeholder="Enter Date" class="form-control mb-3" /></td><td><button type="button" class="btn btn-link remove-tr"><span class="badge badge-center rounded-pill bg-danger"><i class="fa fa-times"></i></span></button></td></tr>'
            );
            ckeditor('editor' + i);
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
