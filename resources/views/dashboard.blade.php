@extends('master')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row py-1">
                <div class="col-12 ">
                    @php
                        $clockedIn = \App\Models\ClockInOut::where('user_id', auth()->user()->id)
                            ->whereNull('clock_out_ip')
                            ->exists();
                    @endphp

                    @if($clockedIn)
                        <a href="{{ route('clock_out').'?id='.auth()->user()->id }}">
                            <button
                                class="btn btn-danger w-100"
                                style="height: 10vh"
                            >
                                <h3>
                                    <i class="far fa-clock"></i>
                                    Clock Out
                                </h3>
                            </button>
                        </a>
                    @else
                        <a href="{{ route('clock_in').'?id='.auth()->user()->id }}">
                            <button
                                class="btn btn-primary w-100"
                                style="height: 10vh"
                            >
                                <h3>
                                    <i class="far fa-clock"></i>
                                    Clock In
                                </h3>
                            </button>
                        </a>
                    @endif

                    <br>
                    <br>
                    @if(session('status'))
                        <div class="alert {{ session('status') == 'Clock In Successfully' ? 'alert-success' : 'alert-danger' }}">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->has('clock_in'))
                        <div class="alert alert-danger">
                            {{ $errors->first('clock_in') }}
                        </div>
                    @endif
                </div>
                <div class="col-6">
                    <!-- You can add content here if needed -->
                </div>
            </div>
        </div>
    </section>
@endsection
