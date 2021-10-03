@extends('backend.layouts.app')
@section('content')
<div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Post Listing </h2>
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Category Listing
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->title}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-outline-light" href="{{ route('admin.post.edit',$value->id) }}"
                                          >Edit</a>
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
