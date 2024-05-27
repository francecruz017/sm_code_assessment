@error($fieldName)
<div class="row justify-content-md-center">
    <div class=" col-sm-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@enderror