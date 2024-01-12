@extends('master')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Confirm Action</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin')  }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index_user') }}">User List</a></li>
                            <li class="breadcrumb-item active">Confirm Action</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <span>Do you want to delete user <strong>{{ $data->name }}</strong>?</span>
                            <ul class="list-unstyled">

                                <li>
                                    <img
                                        style="width: 100%; max-height: 480px;"
                                        src="{{ asset('/images').'/'.$data->image }}"
                                        class="img-fluid img-thumbnail"
                                        alt="{{ $data->name }}"
                                    >
                                </li>
                                <li><strong>Name : </strong> {{ ucfirst($data->name) }} </li>
                                <li><strong>Email: </strong> {{ $data->email }} </li>
                                <li><strong>Role : </strong> {{ strtoupper($data->permission) }} </li>
                            </ul>
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 mb-2">
                                    <a href="{{ route('index_user') }}">
                                        <button type="reset" class="btn btn-secondary btn-block text-sm-center">
                                            <i class="fas fa-times"></i>
                                            <span class="d-md-none">Cancel</span>
                                            <span class="d-none d-md-inline">Cancel</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 mb-2">
                                    <form method="post" action="{{ route('delete_user') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <button type="submit" class="btn btn-danger btn-block text-sm-center">
                                            <i class="far fa-trash-alt"></i>
                                            <span class="d-md-none">Yes, Delete</span>
                                            <span class="d-none d-md-inline">Yes, Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
