@extends('backend.layouts.app')
@section('css')
    <style>
        .dd-handle{
            border-left: 1px solid rgba(19, 29, 40, .125);
            border-right: 1px solid rgba(19, 29, 40, .125);
        }
        .dd-item>button{
            display: none;
        }
        .dd-list .dd-list {
            padding-left: 50px;
            margin-bottom: 10px;
        }
        .dd3-content{
            height: 40px;
            padding-top: 10px;
            padding-left: 50px;
        }
        .dd3-handle{
            height: 40px;
            background: #5969ff;
            border-right: none;
            border-color: #5969ff;
        }
        .dd3-handle:before{
            padding-top: 5px;
        }
    </style>
@stop
@section('page-header')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Menu Management </h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Management</li>
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <input class="form-control" type="text" placeholder="Menu Name" disabled value="{{ $menu->title ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-primary btn-xs float-right" disabled>Save</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menu.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="text" name="display_name" placeholder="Display Name"><br>
                        <input class="form-control" type="file" name="image"><br>
                        <button class="btn btn-xs btn-primary float-right">Save</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Pages
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if($pages->count())
                            @foreach($pages as $page)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{Illuminate\Support\Str::limit($page->title, 25, $end='...')}}
                                    <button class="btn btn-xs btn-default add_page" data-page_id="{{ $page->id }}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </li>
                            @endforeach
                        @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                No pages found
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Menu Structure
                    <button class="btn btn-primary btn-xs float-right saveMenuOrder">Save Order</button>
                </div>
                <div class="card-body">
                    <div class="dd" id="nestable2">
                        <ol class="dd-list">
                            @if(isset($menu_items))
                                @foreach($menu_items as $value)
                                    <li class="dd-item" data-id="{{ $value->id }}">
                                        <div class="dd-handle"> <span class="drag-indicator"></span>
                                            <div>
                                                {{ $value->display_name }}
                                            </div>
                                            <div class="dd-nodrag btn-group ml-auto">
                                                <small class="mr-5 text-warning"><em><i class="fa fa-info-circle"></i> Do not attach page here!</em></small>
                                                @if(!blank($value->page_id) AND $value->page_id !== 0)
                                                    <span class="mr-5"><span class="badge-dot badge-primary"></span>Page</span>
                                                @endif
                                                @include('backend.menu.action-button', ['data' => $value])
                                            </div>
                                        </div>
                                        @if ($value->children->count())
                                            <ol class="dd-list">
                                                @foreach($value->children as $child)
                                                    <li class="dd-item" data-id="{{ $child->id }}">
                                                        <div class="dd-handle"> <span class="drag-indicator"></span>
                                                            <div>
                                                                {{ $child->display_name }}
                                                            </div>
                                                            <div class="dd-nodrag btn-group ml-auto">
                                                                <small class="mr-5 text-warning"><em><i class="fa fa-info-circle"></i> Do not attach page here!</em></small>
                                                                @if(!blank($child->page_id) AND $child->page_id !== 0)
                                                                    <span class="mr-5"><span class="badge-dot badge-primary"></span>Page</span>
                                                                @endif
                                                                {{--<button class="btn btn-xs btn-outline-light edit_btn"--}}
                                                                        {{--data-page="{{$child->page_id}}"--}}
                                                                        {{--data-image="{{$child->image}}"--}}
                                                                        {{--data-title="{{$child->display_name}}"--}}
                                                                        {{--data-id="{{$child->id}}">Edit</button>--}}
                                                                {{--<button class="btn btn-outline-light btn-xs delete_btn" data-id="{{$child->id}}">--}}
                                                                    {{--<i class="far fa-trash-alt"></i>--}}
                                                                {{--</button>--}}
                                                                @include('backend.menu.action-button', ['data' => $child])
                                                            </div>
                                                        </div>
                                                        @if ($child->children->count())
                                                            <ol class="dd-list">
                                                                @foreach($child->children as $subchild)
                                                                    <li class="dd-item" data-id="{{ $subchild->id }}">
                                                                        <div class="dd-handle"> <span class="drag-indicator"></span>
                                                                            <div>
                                                                                {{ $subchild->display_name }}
                                                                            </div>
                                                                            <div class="dd-nodrag btn-group ml-auto">
                                                                                @if(!blank($subchild->page_id) AND $subchild->page_id !== 0)
                                                                                    <span class="mr-5"><span class="badge-dot badge-primary"></span>Page</span>
                                                                                @endif
                                                                                    @include('backend.menu.action-button', ['data' => $subchild])
                                                                                {{--<button class="btn btn-xs btn-outline-light edit_btn"--}}
                                                                                        {{--data-page="{{$subchild->page_id}}"--}}
                                                                                        {{--data-title="{{$subchild->display_name}}"--}}
                                                                                        {{--data-image="{{$subchild->image}}"--}}
                                                                                        {{--data-id="{{$subchild->id}}">Edit</button>--}}
                                                                                {{--<button class="btn btn-outline-light btn-xs delete_btn" data-id="{{$subchild->id}}">--}}
                                                                                    {{--<i class="far fa-trash-alt"></i>--}}
                                                                                {{--</button>--}}
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ol>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-xs float-right saveMenuOrder">Save Order</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
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
                    <p>You are about to delete this menu permanently. Continue?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary btn-xs" data-dismiss="modal">Discard</a>
                    <form action="{{ route('admin.menu.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="menu_id" id="delete_input">
                        <button type="submit" class="btn btn-primary btn-xs">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="{{ route('admin.menu.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="edit_id" type="hidden" name="menu_id" class="form-control">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="edit_title" class="col-form-label">Image</label>
                                            <input id="edit_image" type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <img id="edit_image_url" src="{{ asset('images/default.png') }}" alt="" width="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_title" class="col-form-label">Title</label>
                                    <input id="edit_title" type="text" name="display_name" placeholder="Menu Title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_alt_text" class="col-form-label">Alt text</label>
                                    <input id="edit_alt_text" type="text" name="alt_text" placeholder="Alt text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="edit_target" class="custom-control custom-checkbox">
                                        <input type="checkbox" id="edit_target" name="target" value="_blank" class="custom-control-input">
                                        <span class="custom-control-label">Open menu in new tab?</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="input-select">Attach Post</label>
                                    <select id="edit_page" class="form-control" id="input-select" name="page_id">
                                        <option value="">--- SELECT POST ---</option>
                                        @if($pages->count())
                                            @foreach($pages as $value)
                                                <option value="{{ $value->id }}">{{ Illuminate\Support\Str::limit($value->title, 60, $end='...') }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="custom_css" class="col-form-label">Custom CSS</label>
                                    <textarea name="custom_css" id="edit_custom_css" cols="30" rows="3" class="form-control" placeholder="Enter custom CSS"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary btn-xs" data-dismiss="modal">Discard</a>
                        <button type="submit" class="btn btn-primary btn-xs">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script type="text/javascript">
        $('.dd').nestable({
            maxDepth:3
        });

        $('.saveMenuOrder').on('click', function(){
            $.ajax({
                type: "POST",
                url: "{{ route('admin.menu.saveOrder') }}",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {data:$('.dd').nestable('serialize')},
                success: function (msg) {
                    window.location.reload();
                }
            });
        });

        $('.delete_btn').on('click', function(e){
            e.preventDefault();
            let menu_id = $(this).data("id");
            $("#delete_input").val(menu_id);
            $("#deleteModal").modal('show');
        });

        $('.edit_btn').on('click', function(){
            let menu_page = $(this).data("page");
            if (menu_page !== 0) {
                $("#edit_page").val(menu_page);
            }
            $("#edit_id").val($(this).data("id"));
            $("#edit_title").val($(this).data("title"));
            $("#edit_alt_text").val($(this).data("alt_text"));
            $("#edit_custom_css").val($(this).data("custom_css"));
            if ($(this).data("target") === '_blank') {
                $("#edit_target").prop('checked', 'true');
            }
            if ($(this).data("image") !== '') {
                $("#edit_image_url").prop('src', '/uploads/'+$(this).data("image"));
            }else{
                $("#edit_image_url").prop('src', '{{ asset('images/default.png') }}');
            }
            $("#editModal").modal('show');
        });

        $("#edit_image").on('change', function (event) {
            $("#edit_image_url").prop('src', URL.createObjectURL(event.target.files[0]));
        });

        $('.add_page').on('click', function(){
            let page_id = $(this).data("page_id");
            $.ajax({
                type: "POST",
                url: "{{ route('admin.menu.addPageToMenu') }}",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {page_id:page_id},
                success: function (response) {
                    if (response === 'success'){
                        window.location.reload();
                    }
                }
            });
        });

        $(".modal").on("hidden.bs.modal", function () {
            $("#edit_id").val("");
            $("#edit_title").val("");
            $("#edit_image_url").prop('src', '{{ asset('images/default.png') }}');
            $("#edit_target").prop('checked', false);
            $("#delete_input").val("");
        })
    </script>
@endsection
