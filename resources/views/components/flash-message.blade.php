@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif