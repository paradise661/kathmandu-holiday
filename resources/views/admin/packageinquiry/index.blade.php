@extends('layouts.admin.master')
@section('title', 'Package Inquiries')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Package Inquiries ({{ $inquiries->total() }})</h5>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$inquiries->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($inquiries as $key => $inquiry)
                            <tr>
                                <td><strong>{{ $key + $inquiries->firstItem() }}</strong></td>

                                <td><strong>{{ $inquiry->name ?? '' }}</strong></td>
                                <td>{{ $inquiry->email ?? '' }}</td>
                                <td>{{ $inquiry->phone ?? '' }}</td>
                                <td>{{ $inquiry->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('packageinquiry.show', $inquiry->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa fa-eye"></i></a>

                                    <form class="delete-form" action="{{ route('packageinquiry.destroy', $inquiry->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_inquiry mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $inquiries->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_inquiry').click(function(e) {
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
