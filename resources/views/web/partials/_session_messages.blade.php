@if (Session::has('error'))
    <div class="success-msg alert alert-warning alert-dismissible fade show text-center" role="alert">
        <p class="text-center">
            {{ Session::get('error') }}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>

        </button>
    </div>
@elseif (Session::has('success'))
    <div class="success-msg alert alert-warning alert-dismissible fade show text-center" role="alert">
        <p class="text-center">
            {{ Session::get('success') }}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>

        </button>
    </div>
@endif
