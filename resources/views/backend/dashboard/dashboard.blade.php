@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid dashboard-content" >
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">{{ config('app.name') }} Dashboard</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >

            </div>
        </div>
    </div>
@stop
