@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Time Table</h1>
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
                            <form action="{{ route('time_table') }}" method="get" class="row justify-content-end">
                                <div class="col-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">From</span>
                                        <input required type="date" id="startDate" name="startDate" class="form-control" min="2024-01-01" max="2024-12-31">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                        <input required type="date" id="endDate" name="endDate" class="form-control" min="2024-01-01" max="2024-12-31">
                                    </div>
                                </div>
                                <div class="col-1 pl-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless table-striped" id="myTable">
                                    <thead>
                                    <tr class="table-primary">
                                        <th>No.</th>
                                        <th width="50">Profile</th>
                                        <th class="pl-5">Name</th>
                                        <th>Gender</th>
                                        <th>Clock In Time</th>
                                        <th>Clock Out Time</th>
                                        <th>Time Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">
                                                <img
                                                    style="width: 100%; max-height: 80px;"
                                                    class="img-thumbnail"
                                                    src="{{ asset('images').'/'.auth()->user()->image }}"
                                                    alt="image"
                                                >
                                            </td>
                                            <td class="align-middle pl-5" style="text-transform: uppercase">{{ auth()->user()->name }}</td>
                                            <td class="align-middle" style="text-transform: uppercase">{{ auth()->user()->gender }}</td>
                                            <td class="align-middle">
                                                <span class="{{ \Carbon\Carbon::parse($item->clock_in_time)->hour < 8 ? 'text-success' : 'text-danger' }}">
                                                    {{ \Carbon\Carbon::parse($item->clock_out_time)->format('d-M-Y h:i A') }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                @if($item->clock_out_time != null)
                                                    {{ \Carbon\Carbon::parse($item->clock_out_time)->format('d-M-Y h:i A') }}
                                                @else
                                                    <div class="text-red">
                                                        <img
                                                            class="img-thumbnail rounded-circle border-danger"
                                                            src="{{ asset('dist/img/icon/waiting.png') }}"
                                                            alt="waiting"
                                                            style="width: 30px;height: 30px"
                                                        >
                                                        Waiting
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                @if(\Carbon\Carbon::parse($item->clock_in_time)->hour < 8)
                                                    <span class="text-success">
                                                        <img
                                                            class="img-thumbnail rounded-circle border-success"
                                                            src="{{ asset('dist/img/icon/ontime.png') }}"
                                                            alt="on_time"
                                                            style="width: 30px;height: 30px"
                                                        >
                                                        On Time
                                                    </span>
                                                @else
                                                    <span class="text-danger">
                                                        <img
                                                            class="img-thumbnail rounded-circle border-danger"
                                                            src="{{ asset('dist/img/icon/late.png') }}"
                                                            alt="late"
                                                            style="width: 30px;height: 30px"
                                                        >
                                                        Late
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
