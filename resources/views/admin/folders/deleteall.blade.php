<div class="modal fade" id="folderDeleteAll">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Folders</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <label for="">Desea eliminar todos los folders</label>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <form action="{{ route('folders.destroyall') }}" method="GET">
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </form>
        </div>
      </div>
    </div>
</div>
