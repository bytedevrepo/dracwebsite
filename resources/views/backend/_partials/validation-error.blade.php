@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
