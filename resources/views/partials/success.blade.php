@if(Session::has('responseMessage'))
<div class="row justify-content-md-center">
    <div class=" col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('responseMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif