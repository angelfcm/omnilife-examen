@if ($error = Session::get('error'))
    <div class="alert alert-danger my-2" role="alert">{!! $error !!}</div>
@endif  
@if ($success = Session::get('success'))
    <div class="alert alert-success my-2" role="alert">{!! $success !!}</div>
@endif
@if ($warning = Session::get('warning'))
    <div class="alert alert-warning my-2" role="alert">{!! $warning !!}</div>
@endif