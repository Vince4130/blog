@if ($message = Session::pull('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <strong>{!! $message !!}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
</div>
@endif

@if ($message = Session::pull('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{!! $message !!}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
</div>
@endif

@if ($message = Session::pull('warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <strong>{!! $message !!}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if ($message = Session::pull('info'))
<div class="alert alert-info alert-block alert-dismissible" role="alert">
    <strong>{!! $message !!}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif