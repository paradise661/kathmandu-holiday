@extends('layouts.admin.master')
@section('title', 'Counters')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Icon</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('counters.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('counters.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname">Text</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="" type="text"
                                name="name" value="{{ old('name') }}" placeholder="Happy...">
                            @error('name')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="basic-default-fullname">Number</label>
                            <input class="form-control @error('count_num') is-invalid @enderror" id=""
                                type="number" name="count_num" value="{{ old('count_num') }}" placeholder="1234">
                            @error('count_num')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">After Number</label>
                            <input class="form-control @error('num_postfix') is-invalid @enderror" id=""
                                type="text" name="num_postfix" value="{{ old('num_postfix') }}" placeholder="K+">
                            @error('num_postfix')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" type="number" name="order"
                                value="{{ old('order') }}">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i> Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
