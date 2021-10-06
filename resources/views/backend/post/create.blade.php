@extends('backend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend-assets\vendor\summernote\css\summernote-bs4.css') }}">
@stop
@section('page-header')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">
                    Create Post
                    <a href="{{ route('admin.post.index') }}" class="btn btn-sm btn-primary float-right">All Posts</a>
                </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}" class="breadcrumb-link">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $edit->id ?? '' }}" name="id">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class="col-form-label">Title</label>
                                    <input id="title" type="text" class="form-control"
                                           name="title" value="{{ $edit->title ?? old('title') }}"
                                           placeholder="Enter page title">
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-form-label">
                                        Slug
                                        <small class="ml-2 text-warning">(<em>Slug field is auto generated.</em>)
                                            <a class="btn btn-xs btn-link" href="#" id="edit_slug">Edit</a>
                                        </small>
                                    </label>
                                    <input id="slug" type="text" class="form-control"
                                           name="slug" value="{{ $edit->slug ?? old('slug') }}"
                                           disabled placeholder="Auto Generated">
                                </div>
                                <div class="form-group">
                                    <label for="excerpt" class="col-form-label">Excerpt</label>
                                    <textarea name="excerpt" cols="10" rows="5"
                                              class="form-control form-control-sm"
                                              placeholder="Enter excerpt">{{ $edit->excerpt ?? old('excerpt') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="body">Body</label>
                                    <textarea class="form-control" id="summernote" name="body" rows="6">{{ $edit->body ?? old('body') }}</textarea>
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
                                    <input id="meta_title" type="text"  class="form-control"
                                           placeholder="Meta title"
                                           name="meta_title" value="{{ $edit->meta_title ?? old('meta_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyboard" class="col-form-label">Meta-Keyboard</label>
                                    <input id="meta_keyboard" type="text"  class="form-control form-control-lg"
                                           placeholder="Meta keywords"
                                           name="meta_keyword" value="{{ $edit->meta_keyword ?? old('meta_keyword') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description" class="col-form-label">Meta-Description</label>
                                    <textarea name="meta_description"
                                              class="form-control form-control-lg" id="" placeholder="Meta description"
                                              cols="30" rows="10">{{ $edit->meta_description ?? old('meta_description')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                        <div class="sidebar-nav-fixed">
                            <div class="card">
                                <h5 class="card-header">
                                    Actions
                                    <div class="float-right">
                                        <button class="btn btn-xs btn-secondary" name="submit" value="0">Save Draft</button>
                                        <button class="btn btn-xs btn-primary" name="submit" value="1">Publish</button>
                                        <br>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" checked="" name="continue_edit" class="custom-control-input" value="1">
                                            <span class="custom-control-label">Continue editing</span>
                                        </label>
                                    </div>
                                </h5>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Visibility
                                            <div class="text-right">
                                                @if(isset($edit->status) AND $edit->status == 1)
                                                    <span class="badge badge-success badge-pill"><small>Published</small></span>
                                                @elseif(isset($edit->status) AND $edit->status == 0)
                                                    <span class="badge badge-brand badge-pill"><small>Draft</small></span>
                                                @else
                                                    <span class="badge badge-brand badge-pill"><small>None</small></span>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Published
                                            @if(isset($edit->published_date) AND $edit->published_date != '')
                                                <small class="text-right">{{ $edit->published_date->format('M d Y H:i:s A') }}</small>
                                            @endif
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Created
                                            @if(isset($edit->created_at) AND $edit->created_at != '')
                                                <small class="text-right">{{ $edit->created_at->format('M d Y') }} by {{ $edit->createdBy->name }}</small>
                                            @endif
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Category
                                            @if(isset($edit->category->title) AND $edit->category->title != '')
                                                <small class="text-right">{{ $edit->category->title }}</small>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Background Image
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-4">
                                        @if(isset($edit->background_image) AND $edit->background_image != '')
                                            <img id="image_display" src="{{ asset('uploads/'.$edit->background_image) }}" alt="" width="200" class="rounded">
                                        @else
                                            <img id="image_display" src="{{ asset('images/default.png') }}" alt="" width="200" class="rounded">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="card pb-2">
                                <div class="card-header">
                                    Categories
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select name="category" id="" class="form-control">
                                            <option value="">--- SELECT CATEGORY ---</option>
                                            @if($categories->count())
                                                @foreach($categories as $value)
                                                    <option
                                                        value="{{ $value->id }}"
                                                        {{ (isset($edit->category->id) AND $edit->category->id == $value->id) ? 'selected' : '' }}>
                                                        {{ $value->title ?? '' }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend-assets\vendor\summernote\js\summernote-bs4.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#edit_slug").on('click', function (e) {
                e.preventDefault();
                $("#slug").removeAttr('disabled', 'false');
            })
            $('#summernote').summernote({
                height: 300
            });

            $("#image").on('change', function (event) {
                $("#image_display").prop('src', URL.createObjectURL(event.target.files[0]));
            });
        });
    </script>
@stop
