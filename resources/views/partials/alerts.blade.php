<div class="row">
    @if( Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <h5><i class="icon fas fa-check"></i>Success</h5>
            {{ Session::get('success') }}
        </div>
    @endif
</div>
