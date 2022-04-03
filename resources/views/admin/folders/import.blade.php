{{-- <form action="{{ route('folders.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if (Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
    <input type="file" name="file">
    <button>importar</button>
</form> --}}
<div class="modal fade" id="folderImport">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Importar Carpetas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('folders.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">importar</button>
            </div>
        </form>
      </div>
    </div>
</div>
