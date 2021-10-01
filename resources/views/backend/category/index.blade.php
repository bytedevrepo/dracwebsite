@extends('backend.layouts.app')
@section('content')
<div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Post Category </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Post Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    @if(blank($edit))
                    Create Category
                     @else
                        Edit Category
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="text" value="{{ (!blank($edit)) ? $edit->title: '' }}" name="title" placeholder="Title"><br>
                        <input type="hidden" value="{{ (!blank($edit)) ? $edit->id: '' }}" name="category_id" >
                        <button class="btn btn-xs btn-primary float-right">{{(!blank($edit) ? 'Update' : 'Save' )}}</button>
                        @if (!blank($edit))
                        <a href="{{ route('admin.category.index') }}" class="btn btn-xs btn-default float-right mr-2">Discard</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Category Listing
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $value)
                            <tr>
                                <td>{{$value['id']}}</td>
                                <td>{{$value['title']}}</td>
                                    <td>
                                        <button class="btn btn-xs btn-outline-light edit_btn"><a href="{{ route('admin.category.edit',$value['id']) }}"
                                          >Edit</a></button>
                                            <button class="btn btn-outline-light btn-xs delete_btn">
                                                 <a href="{{ route('admin.category.delete',$value['id']) }}">
                                                    @csrf
                                                <i class="far fa-trash-alt"></i></a>
                                        </button>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
