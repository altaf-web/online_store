@extends('layouts.app')
@section("page_css")
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section("content")
    <div class="card">
        <div class="card-header">
            <h5>Products</h5>
            <x-card-header-right></x-card-header-right>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" style="width: 99%">
                    <thead>
                    <span><a href="{{ route('clients.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square-o"></i>Client</a></span>

                    <tr>
                        <x-head-tag>#</x-head-tag>
                        <x-head-tag>Title</x-head-tag>
                        <x-head-tag>Last Name</x-head-tag>
                        <x-head-tag>Role</x-head-tag>
                        <x-head-tag>Action</x-head-tag>
                    </tr>
                    </thead>
                    <tbody>
                    @section("page_js")
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
                        <script src="{{ asset('js/client.js') }}"></script>

                        <script type="text/javascript">
                            $(function () {
                                var table = $('.yajra-datatable').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: "{{ route('clients.all') }}",
                                    columns: [
                                        {data: 'id', name: 'id'},
                                        {data: 'first_name', name: 'first_name'},
                                        {data: 'last_name', name: 'last_name'},
                                        {data: 'role_id', name: 'role_id'},
                                        {
                                            data: 'action',name: 'action',
                                            orderable: true,
                                            searchable: true
                                        },
                                    ]
                                });

                            });
                        </script>

                    @endsection
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
