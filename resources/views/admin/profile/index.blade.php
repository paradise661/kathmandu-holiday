@extends('layouts.admin.master')
@section('title', 'Profile - Kathmandu Holiday')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Change Password</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('change.password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Current Password</label>
                        <input class="form-control @error('current_password') is-invalid @enderror" id=""
                            type="password" name="current_password" value="{{ old('current_password') }}" placeholder="">
                        @error('current_password')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">New Password</label>
                        <input class="form-control @error('new_password') is-invalid @enderror" id=""
                            type="password" name="new_password" value="{{ old('new_password') }}" placeholder=""
                            autocomplete="off">
                        @error('new_password')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Confirm New Password</label>
                        <input class="form-control @error('new_password_confirmation') is-invalid @enderror" id=""
                            type="password" name="new_confirm_password" value="{{ old('new_confirm_password') }}"
                            placeholder="" autocomplete="off">
                        @error('new_confirm_password')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-refresh"></i> Change</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
