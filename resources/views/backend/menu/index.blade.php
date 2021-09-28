@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Menu Name" disabled value="{{ $menu->title ?? '' }}">
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn btn-primary btn-sm" disabled>Update</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.menu.save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="text" name="display_name" placeholder="Display Name"><br>
                            <input class="form-control" type="file" name="image"><br>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Menu Structure</h5>
                        <div class="dd">
                            <ol class="dd-list">
                                @if(isset($menu_items))
                                    @foreach($menu_items as $value)
                                        <li class="dd-item" data-id="{{ $value->id }}">
                                            <div class="dd-handle">{{ $value->display_name }}</div>
                                            @if ($value->children->count())
                                                <ol class="dd-list">
                                                    @foreach($value->children as $child)
                                                        <li class="dd-item" data-id="{{ $child->id }}">
                                                            <div class="dd-handle">{{ $child->display_name }}</div>
                                                            @if ($child->children->count())
                                                                <ol class="dd-list">
                                                                    @foreach($child->children as $subchild)
                                                                        <li class="dd-item" data-id="{{ $subchild->id }}">
                                                                            <div class="dd-handle">{{ $subchild->display_name }}</div>
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
                </div>
                <div class="card-footer">
                    <button id="saveMenuOrder" class="btn btn-primary btn-sm">Update</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        $('.dd').nestable({
            maxDepth:3
        });

        $('#saveMenuOrder').on('click', function(){
            $.ajax({
                type: "POST",
                url: "{{ route('admin.menu.saveOrder') }}",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {data:$('.dd').nestable('serialize')},
                success: function (msg) {
                    console.log(msg);
                    // $("#confirmDelete").modal("hide");
                    // window.location.reload();
                }
            });
        });
    </script>
@endsection
