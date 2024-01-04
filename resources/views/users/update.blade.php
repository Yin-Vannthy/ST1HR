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
                        <li class="breadcrumb-item"><a href="{{ route('index_user') }}">User List</a></li>
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
                            <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">

                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <p>
                                            @foreach($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        </p>
                                    </div>

                                @endif
                                <input
                                    type="hidden"
                                    class="form-control"
                                    id="id"
                                    name="id"
                                    value="{{ old('id',$data->id) }}"
                                >
                                <div class="form-group">
                                    <label for="image" class="form-label">Old Profile</label>
                                    <div class="pb-2">
                                        <img
                                            class="img-thumbnail"
                                            src="{{ asset('images'.'/'.$data->image) }}"
                                            alt="image"
                                            style="width: 5%; max-height: 80px"
                                        >
                                    </div>
                                    <div>
                                        <input
                                            type="file"
                                            class="form-control"
                                            id="image"
                                            name="image"
                                        >
                                    </div>
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
                                            value="{{ old('name', $data->name) }}"
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
                                            value="{{ old('telphone', $data->telphone) }}"
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender"  class="form-select form-control" required>
                                            <option
                                                value="male"
                                                {{$data->gender == 'male' ? 'selected' : '' }}
                                                {{ old('gender') == 'male' ? 'selected' : '' }}
                                            >
                                                Male
                                            </option>
                                            <option
                                                value="female"
                                                {{ $data->gender == 'female' ? 'selected' : '' }}
                                                {{ old('gender') == 'female' ? 'selected' : '' }}
                                            >
                                                Female
                                            </option>
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
                                            value="{{ old('email', $data->email) }}"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="permission" class="form-label">Permission</label>
                                    <select name="permission" id="permission" class="form-select form-control" required>
                                        <option
                                            value="admin"
                                            {{$data->permission == 'admin' ? 'selected' : '' }}
                                            {{ old('permission') == 'admin' ? 'selected' : '' }}
                                        >
                                            Admin
                                        </option>
                                        <option
                                            value="hr"
                                            {{$data->permission == 'hr' ? 'selected' : '' }}
                                            {{ old('permission') == 'hr' ? 'selected' : '' }}
                                        >
                                            HR
                                        </option>
                                        <option
                                            value="employee"
                                            {{$data->permission == 'employee' ? 'selected' : '' }}
                                            {{ old('permission') == 'employee' ? 'selected' : '' }}
                                        >
                                            Employee
                                        </option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input
                                            autocomplete="off"
                                            type="password"
                                            class="form-control" id="password"
                                            name="password"
                                            value=""
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="conifirm_password" class="form-label">Confirm Password</label>
                                        <input
                                            autocomplete="off"
                                            type="password"
                                            class="form-control"
                                            id="conifirm_password"
                                            name="password_confirmation"
                                            value=""
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
