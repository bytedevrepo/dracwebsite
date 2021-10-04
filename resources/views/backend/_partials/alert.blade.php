@if(Session::has('message'))
    {{--<div class="container-fluid dashboard-content pb-0">--}}
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    {{ Session::get('message') }}

                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
            </div>
        </div>
    {{--</div>--}}
@endif
