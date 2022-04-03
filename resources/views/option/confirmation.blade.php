@if(session('confirmation'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <p>{{ session('confirmation') }}</p>
    </div>
@endif