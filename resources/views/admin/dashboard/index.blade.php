@extends('admin.layouts.app')

@section('content')
    <h1>
        Dashboard
    </h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">
                        Number of users : {{ $users }}
                    </p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to Users</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Shops</h5>
                    <p class="card-text">
                        Number of shops : {{ $shops }}
                    </p>
                    <a href="{{ route('admin.shops.index', ['post_type' => 'restaurant']) }}" class="btn btn-primary">Go to
                        Shops</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Media</h5>
                    <p class="card-text">
                        Number of media : {{ $medias }}
                    </p>
                    <a href="{{ route('admin.media.index') }}" class="btn btn-primary">Go to Media</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Kitchen Terms</h5>
                    <p class="card-text">
                        Number of kitchen terms : {{ $kitchen_terms }}
                    </p>
                    <a href="{{ route('admin.terms.index', ['term_type' => 'kitchen']) }}" class="btn btn-primary">Go to
                        Kitchen Terms</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Service Terms</h5>
                    <p class="card-text">
                        Number of service terms : {{ $service_terms }}
                    </p>
                    <a href="{{ route('admin.terms.index', ['term_type' => 'service']) }}" class="btn btn-primary">Go to
                        Service Terms</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
@endsection
