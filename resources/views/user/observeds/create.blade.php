<div class="modal fade" id="observedCreate{{ $assign->folder->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Observación</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                    <div class="card-body">
                        <label for="">Desea marcar como observado</label>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a type="submit" class="btn btn-primary" href="{{ route('observeds.store', $assign->folder->id) }}">Observar</a>
            </div>
      </div>
    </div>
</div>
