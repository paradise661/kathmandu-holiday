@extends('layouts.admin.master')
@section('title', 'Braches')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Branches "{{ $branch->location ?? '' }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('branches.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('branches.update', $branch->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Title</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="" type="text"
                            value="{{ old('name', $branch->name) }}" name="name" placeholder="">
                        @error('name')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Location</label>
                        <input class="form-control @error('location') is-invalid @enderror" id="" type="text"
                            value="{{ old('location', $branch->location) }}" name="location" placeholder="">
                        @error('location')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" id="" type="text"
                            value="{{ old('email', $branch->email) }}" name="email" placeholder="">
                        @error('email')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" id="" type="text"
                            value="{{ old('phone', $branch->phone) }}" name="phone" placeholder="">
                        @error('phone')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Order</label>
                        <input class="form-control @error('order') is-invalid @enderror" type="number" name="order"
                            value="{{ old('order', $branch->order) }}">
                        @error('order')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
