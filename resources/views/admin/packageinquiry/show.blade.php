@extends('layouts.admin.master')
@section('title', 'Package Inquiries')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Package Inquiries</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('packageinquiry.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-5">
                    <thead>
                        <tr>
                            <th scope="col">Field</th>
                            <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $packageinquiry->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $packageinquiry->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $packageinquiry->email }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $packageinquiry->address }}</td>
                        </tr>
                        <tr>
                            <td>Number of Pax</td>
                            <td>{{ $packageinquiry->numpax }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{ $packageinquiry->date }}</td>
                        </tr>
                        <tr>
                            <td>Package</td>
                            <td>
                                @if ($packageinquiry->pckid != 0)
                                    <a href="{{ route('packages.show', $package->slug) }}"
                                        target="_blank">{{ $package->name }}</a>
                                @else
                                    <p>Popup Form</p>
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{!! $packageinquiry->message !!}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ $packageinquiry->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
