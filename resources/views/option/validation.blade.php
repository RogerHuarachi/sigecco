@if(session('validation'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <p>{{ session('validation') }}</p>
    </div>
@endif