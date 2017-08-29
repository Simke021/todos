@if(Session::has('success'))
    <div class="alert alert-success text-center" role="alert">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif