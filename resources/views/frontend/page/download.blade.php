@extends('layouts.frontend.master')
@section('content')
    <!-- resources/views/frontend/page/download.blade.php -->
    <div class="humanresources-wrapper section-padding mt-5">
        <div class="container">
            <div class="row">
                <table class="download-table col-lg-12 col-md-12">
                    <thead class="download-head">
                        <tr>
                            <th>S.N</th>
                            <th rowspan="4">Name</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody class="download-body">
                        @foreach ($download as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value['name'] }}</td>
                                <td><a class="btn btn-primary viewbtn" target="_blank" href="{{ asset($value['url']) }}"
                                        download="">Download</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<style>
    .humanresources-wrapper {
        padding: 0 0 200px 0;
    }

    .download-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        border: 1px solid #ddd;
        /* Border around the table */
    }

    .download-table th,
    .download-table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
        /* Border around each cell */
    }

    .download-table th {
        background-color: #f4f4f4;
        color: #333;
        font-weight: bold;
    }

    .download-body tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .download-body tr:hover {
        background-color: #f1f1f1;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .btn-primary {
        background-color: #005191 !important;
        border: none;
        color: white;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .download-head th {
        padding-top: 12px;
        padding-bottom: 12px;
    }
</style>
