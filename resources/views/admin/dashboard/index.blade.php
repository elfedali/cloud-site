@extends('admin.layouts.app')

@section('content')
    <h1>
        Dashboard
    </h1>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('label.users') }}
                    </h5>
                    <p class="card-text">
                        {{ __('label.users') }} : {{ $users }}
                    </p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-link">
                        {{ __('label.see_more') }}
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 mb-4 -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('label.restaurants') }}
                    </h5>
                    <p class="card-text">
                        {{ __('label.restaurants') }} : {{ $shops }}
                    </p>
                    <a href="{{ route('admin.shops.index', ['post_type' => 'restaurant']) }}" class="btn btn-link">
                        {{ __('label.see_more') }}
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 mb-4 -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100 text-bg-light">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        {{ __('label.add_new_restaurant') }}
                    </h4>



                    <div>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-link">
                            + {{ __('label.add_new_user') }}
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('admin.shops.create', ['post_type' => 'restaurant']) }}" class="btn btn-link">
                            + {{ __('label.add_new_restaurant') }}
                        </a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 mb-4 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('label.kitchens') }}
                    </h5>
                    <p class="card-text">
                        {{ __('label.kitchens') }} : {{ $kitchen_terms }}

                    </p>
                    <a href="{{ route('admin.terms.index', ['term_type' => 'kitchen']) }}" class="btn btn-link">
                        {{ __('label.see_more') }}
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 mb-4 -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('label.services') }}
                    </h5>
                    <p class="card-text">
                        {{ __('label.services') }} : {{ $service_terms }}
                    </p>
                    <a href="{{ route('admin.terms.index', ['term_type' => 'service']) }}" class="btn btn-link">
                        {{ __('label.see_more') }}
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-lg-4 mb-4 -->
    </div>
    <!-- /.row -->
@endsection
