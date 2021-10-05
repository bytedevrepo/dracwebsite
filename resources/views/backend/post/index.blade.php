@extends('backend.layouts.app')
@section('page-header')
    <div class="page-header">
        <h2 class="pageheader-title">
            All Posts
            <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-primary float-right">Create new post</a>
        </h2>
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
                </ol>
            </nav>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" style="width:85px" class="text-center">S.N</th>
                            <th scope="col" style="width:150px" class="text-center">Background</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col" style="width:150px">Status</th>
                            <th scope="col" class="text-center" style="width:150px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!blank($pages))
                            @foreach($pages as $value)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>

                                    <td class="text-center">
                                        <img src="{{ asset('uploads/'. $value->background_image) }}" alt="" width="45" class="rounded">
                                    <td>
                                        <a href="{{ route('admin.post.edit',$value->id) }}">{{$value->title}}</a>
                                    </td>
                                    <td>
                                        {{ $value->category->title ?? 'none' }}
                                    </td>
                                    <td>
                                        @if($value->status)
                                            <span class="badge-dot badge-success mr-1"></span>Published
                                        @else
                                            <span class="badge-dot badge-brand mr-1"></span>Draft
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-outline-primary" href="{{ route('admin.post.edit',$value->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button class="btn btn-outline-danger btn-xs delete_btn">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No items available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p>You are about to delete this post permanently. Continue?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary btn-xs" data-dismiss="modal">Discard</a>
                    <form action="{{ route('admin.post.delete',$value->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" id="delete_input">
                        <button type="submit" class="btn btn-primary btn-xs">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.delete_btn').on('click', function(){
            let id = $(this).data("id");
            $("#delete_input").val(id);
            $("#deleteModal").modal('show');
        });
    </script>
@endsection
