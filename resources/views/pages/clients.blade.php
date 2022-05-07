@extends('layouts.app')
@section("page_css")
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section("content")

    <!-- Add Client -->
    <div class="modal" id="CreateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="CreateModalForm" enctype="multipart/form-data">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <x-forms.model-title> <i class="fa fa-plus-circle"></i> Add Client </x-forms.model-title>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <x-forms.input type="text" name="first_name"   placeholder="Enter first name" maxlength="30"/>
                        <x-forms.input type="text" name="last_name"    placeholder="Enter last name"  maxlength="30"/>
                        <x-forms.input type="text" name="phone_number" placeholder="Enter cell number" />
                        <x-forms.client-drop-down />
                    </div>
                    <div class="modal-footer">
                        <x-forms.button type="button" class="btn btn-success sm" id="SubmitCreateModal">Create</x-forms.button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Article Modal -->
    <div class="modal" id="EditModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" name="editForm">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-edit"> Edit Client</i></h4>
                        <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="alert-danger alert-dismissible fade show mb-3" role="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="alert-success alert-dismissible fade show mb-3" role="alert" style="display: none;">
                            <strong>Success!</strong> Category Updated successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="EditModalBody"></div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="SubmitEditForm">Update</button>
                        <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Article Modal -->
    <div class="modal" id="DeleteAlert">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-trash"></i>Client</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h5>Are you sure want to delete?</h5>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h5>Products</h5>
            <x-card-header-right></x-card-header-right>
        </div>

        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" style="width: 99%">
                    <thead>
                    <span>
                         <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateModal">
                          <i class="fa fa-plus-square-o"></i>Add About
                        </button>
                    </span>

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

                        <script type="text/javascript">
                            $(function () {
                                let table = $('.yajra-datatable').DataTable({
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


                            $('#SubmitCreateModal').click(function(e) {
                                e.preventDefault();
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                let data = new FormData(document.getElementById("CreateModalForm"));
                                $.ajax({
                                    url: "{{ route('clients.store') }}",
                                    method: 'post',
                                    data: data,
                                    contentType: false,
                                    processData: false,
                                    success: function(result) {
                                        if(result.errors) {
                                            $('.alert-danger').html('');
                                            $.each(result.errors, function(key, value) {
                                                $('.alert-danger').show();
                                                $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                                            });
                                        } else {
                                            $('.alert-danger').hide();
                                            $('.alert-success').show();
                                            $('.datatable').DataTable().ajax.reload();
                                            $('.alert-success').hide();
                                            $('#CreateModal').modal('hide');
                                            //reset-form-fields
                                            resetFormFields('CreateModalForm');
                                            getMessage(result.status,'top-right',result.message);
                                        }
                                    }
                                });
                            });



                            // Get a single EditModel
                            $('.modelClose').on('click', function(){
                                $('#EditModal').hide();
                            });

                            //edit-model
                            let id;
                            $('body').on('click','#getEditLocationData', function (e) {
                                e.preventDefault();
                                $('.alert-danger').html('');
                                $('.alert-danger').hide();
                                id = $(this).data('id');
                                $.ajax({
                                    url: "clients/"+id+"/edit",
                                    method: 'GET',
                                    success: function(result) {
                                        $('#EditModalBody').html(result.html);
                                        $('#EditModal').show();
                                    }
                                });
                            });


                            //delete client
                            let deleteID;
                            $('body').on('click','.delete', function() {
                                deleteID = $(this).data('id');
                            });

                            $('#SubmitDeleteArticleForm').click(function(e) {
                                e.preventDefault();
                                let id = deleteID;
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: "clients/"+id,
                                    method: 'DELETE',
                                    success: function(result) {
                                        $('#DeleteArticleModal').hide();
                                        $('.datatable').DataTable().ajax.reload();
                                        getMessage(result.status,'top-right',result.message);
                                    }
                                });
                            });


                            function getMessage(s,p,t) {
                                return $.toast({
                                    heading: s,
                                    position:p,
                                    text: t,
                                    showHideTransition: 'plain',
                                    icon: s.toLowerCase()
                                });
                            }

                        </script>
                    @endsection
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
