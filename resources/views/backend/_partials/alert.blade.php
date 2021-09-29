@if(Session::has('message'))
    <div class="container-fluid dashboard-content pb-0">
        <div class="row mb-0">
            <div class="col-md-12">
                <div class="alert alert-success mb-0" role="alert">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>
    </div>
@endif
