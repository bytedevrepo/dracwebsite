@extends('backend.layouts.app')
@section('page-header')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Home page CMS</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">CMS</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Background Image
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.cms.save_home') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="home_background" name="key">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_keyboard" class="col-form-label">Image</label>
                                    <input class="form-control" type="file" name="image"><br>
                                </div>
                                <button class="btn btn-xs btn-primary float-right">Save</button>
                            </div>
                            <div class="col-md-6">
                                @if($background)
                                    <img src="{{ asset('storage/'.$background->value) }}" alt="" width="200" class="rounded">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="" width="200" class="rounded">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

@endsection
