@extends('layouts.app')
@section('content')
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-plus-circle"></i> Add Client</h5>
                    </div>
                    <div class="card-block">

                        <form class="row g-3" id="form"  method="post" action="{{ route('clients.store') }}">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{@old('first_name')}}" placeholder="John" autocomplete="off" maxlength="30">
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Doe" value="{{ @old('last_name') }}" maxlength="30">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="3331234567" value="{{ @old('phone_number') }}" autocomplete="off" maxlength="11">
                                @error('phone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select name="role_id" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">Select Type (Client)</option>
                                    @foreach([1=>'vendor','seller'] as $key => $client)
                                        <option value="{{ $key }}">{{ $client }}</option>
                                    @endforeach
                                    @error('role')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>

                            <div class="col-12 mt-4">
                                <input type="submit" class="btn btn-primary btn-sm" value="Submit form">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection
@section('page_js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#form').validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                        digits: true,
                        min:11,
                    },
                    role : {
                        required:true
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection

