@extends('master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/users')}}">User List</a></li>
                        <li class="breadcrumb-item active">Create Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('create_user') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif

                                <div class="form-group">
                                    <label for="image" class="form-label">User Profile</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image"
                                        name="image"
                                    >
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name" class="form-label">User Name</label>
                                        <input
                                            autocomplete="off"
                                            required
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{old('name')}}"
                                        >
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="telphone" class="form-label">Phone Number</label>
                                        <input
                                            autocomplete="off"
                                            required
                                            type="text"
                                            inputmode="numeric"
                                            pattern="\d*"
                                            class="form-control"
                                            id="telphone"
                                            name="telphone"
                                            value="{{old('telphone')}}"
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-select form-control" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input
                                            autocomplete="off"
                                            required
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            name="email"
                                            value="{{old('email')}}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="permission" class="form-label">Permission</label>
                                    <select name="permission" id="permission" class="form-select form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="hr">HR</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input
                                            autocomplete="off"
                                            required type="password"
                                            class="form-control" id="password"
                                            name="password"
                                            value="{{old('password')}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="conifirm_password" class="form-label">Confirm Password</label>
                                        <input
                                            autocomplete="off"
                                            required
                                            type="password"
                                            class="form-control"
                                            id="conifirm_password"
                                            name="conifirm_password"
                                            value="{{old('confirm_password')}}"
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('index_user') }}">
                                        <button type="button" class="btn btn-danger float-left">
                                            <i class="fas fa-arrow-left"></i>
                                            Back
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fas fa-save"></i>
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger float-right mr-1">
                                        <i class="fas fa-window-close"></i>
                                        Clear
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
