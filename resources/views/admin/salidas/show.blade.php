<div class="modal fade" id="salidaShow{{ $salida->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de Salida</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-5">Fecha</dt>
                <dd class="col-sm-7">
                    {{ $salida->arqueo->date }}
                </dd>
                <dt class="col-sm-5">Agencia</dt>
                <dd class="col-sm-7">
                    {{ $salida->arqueo->agency->name }}
                </dd>
                <dt class="col-sm-5">Categoria</dt>
                <dd class="col-sm-7">
                    {{ $salida->category }}
                </dd>
                <dt class="col-sm-5">Item</dt>
                <dd class="col-sm-7">
                    {{ $salida->item }}
                </dd>
                <dt class="col-sm-5">Monto</dt>
                <dd class="col-sm-7">
                    {{ $salida->money }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
