@extends('layouts.admin.master')
@section('title', 'All Links - Kathmandu Holiday')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Youtube Links ({{ $youtube->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('youtube.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>
        <div class="table-responsive text-nowrap">
            @if ($youtube->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Url</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($youtube as $key => $yt)
                            <tr>
                                <td><strong>{{ $key + $youtube->firstItem() }}</strong></td>
                                <td>{{ $yt->title ?? '-' }}</td>
                                <td><strong>{{ Str::words(strip_tags($yt->description), 8, '...') }}</strong>
                                </td>
                                <td>{{ $yt->url ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('youtube.edit', $yt->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('youtube.destroy', $yt->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_youtube mr-2" id="" data-type="confirm"
                                            type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $youtube->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>

@endsection

    @section('scripts')
        <script>
            $('.delete_youtube').click(function (e) {
                e.preventDefault();
                swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            $(this).closest("form").submit();
                        }
                    });

            });
        </script>
    @endsection