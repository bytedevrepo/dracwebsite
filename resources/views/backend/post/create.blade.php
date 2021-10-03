@extends('backend.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('backend-assets\vendor\summernote\css\summernote-bs4.css') }}">
@stop
@section('content')
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Create Post </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}" class="breadcrumb-link">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $edit->id ?? '' }}" name="id">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="title" name="title" class="col-form-label">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ $edit->title ?? old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="background-image" name="background-image" class="col-form-label">Background-Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="excerpt" class="col-form-label">Excerpt</label>
                            <input id="excerpt" type="text"  class="form-control form-control-sm" name="excerpt" value="{{ $edit->title ?? old('excerpt') }}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="body">Body</label>
                            <textarea class="form-control" id="summernote" name="body" rows="6">{{ $edit->title ?? old('body') }}</textarea>
                        </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    SEO
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="meta_title" class="col-form-label">Meta-Title</label>
                        <input id="meta_title" type="text"  class="form-control" name="meta_title" value="{{ $edit->title ?? old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_keyboard" class="col-form-label">Meta-Keyboard</label>
                        <input id="meta_keyboard" type="text"  class="form-control form-control-lg" name="meta_keyword" value="{{ $edit->title ?? old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_description" class="col-form-label">Meta-Description</label>
                        <textarea name="meta_description" class="form-control form-control-lg" id="" cols="30" rows="10">
                            {{ $edit->meta_description ?? old('meta_description')}}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
            <div class="sidebar-nav-fixed">
                <ul class="list-unstyled">
                    <li>
                        <button class="btn btn-xs btn-secondary" name="submit" value="0">Draft</button>
                        <button class="btn btn-xs btn-primary" name="submit" value="1">Publish</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   </form>
</div>
@endsection
@section('script')
<script src="{{ asset('backend-assets\vendor\summernote\js\summernote-bs4.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300
        });
    });
    </script>
    @stop
