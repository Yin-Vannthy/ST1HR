@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('index_create') }}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless table-striped">
                                    <thead>
                                    <tr class="table-primary">
                                        <th>No.</th>
                                        <th width="50">Profile</th>
                                        <th class="pl-5">Name</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td>
                                                <img
                                                    style="
                                                    width: 100%;
                                                    max-height: 60px;
                                                    "
                                                    class="img-thumbnail"
                                                    src="{{ asset('images').'/'.$item->image }}"
                                                    alt="image"
                                                >
                                            </td>
                                            <td
                                                class="pl-5 align-middle"
                                                style="text-transform: capitalize;"
                                            >
                                                {{ $item->name }}
                                            </td>
                                            <td
                                                class="align-middle"
                                                style="text-transform: uppercase"
                                            >
                                                {{ $item->gender }}
                                            </td>
                                            <td class="align-middle">{{ $item->telphone }}</td>
                                            <td class="align-middle">{{ $item->email }}</td>
                                            <td
                                                class="align-middle"
                                                style="text-transform: uppercase"
                                            >
                                                {{ $item->permission }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('index_update_user').'?id='.$item->id }}">
                                                    <button>
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('confirm_delete').'?id='.$item->id }}">
                                                    <button>
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
