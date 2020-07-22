@if($errors->hasBag())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <div>{!!  $error  !!}</div>
        @endforeach
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
