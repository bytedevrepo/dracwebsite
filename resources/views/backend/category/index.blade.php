@extends('backend.layouts.app')
@section('page-header')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Post Category </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    @if(blank($edit))
                        Create Category
                    @else
                        Update Category
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ (!blank($edit)) ? $edit->id: '' }}" name="category_id" >
                        <div class="form-group">
                            <label for="meta_keyboard" class="col-form-label">Category Title</label>
                            <input class="form-control" type="text" value="{{ (!blank($edit)) ? $edit->title: '' }}" name="title" placeholder="Title"><br>
                        </div>
                        <button class="btn btn-xs btn-primary float-right">{{(!blank($edit) ? 'Update' : 'Save' )}}</button>
                        @if (!blank($edit))
                            <a href="{{ route('admin.category.index') }}" class="btn btn-xs btn-default float-right mr-2">Discard</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Category Listing
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;" scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Slug</th>
                            <th class="text-center" scope="col" style="width: 150px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!blank($category))
                            @foreach($category as $value)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->slug}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-outline-primary edit_btn">
                                            <a href="{{ route('admin.category.edit',$value['id']) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </button>
                                        <button class="btn btn-outline-danger btn-xs delete_btn" data-id="{{ $value->id }}">
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
    <div class="modal" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="confirm_delete" href="#" type="submit" class="btn btn-primary btn-xs">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $('.delete_btn').on('click', function(e){
            e.preventDefault();
            let id = $(this).data("id");
            var url = '/admin/post/category/delete/'+id;
            $("#confirm_delete").attr('href', url);
            $("#deleteCategoryModal").modal('show');
        });

        $(".modal").on("hidden.bs.modal", function () {
            $("#confirm_delete").attr('href', '#');
        })
    </script>
@endsection
