<div class="modal fade" id="agencieshow{{ $agency->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de Agencia</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Nombre de Agencia</dt>
                <dd class="col-sm-8">
                    {{ $agency->name }}
                </dd>
                <dt class="col-sm-4">Codigo de Agencia</dt>
                <dd class="col-sm-8">
                    {{ $agency->codigo }}
                </dd>
                <dt class="col-sm-4">Departamento</dt>
                <dd class="col-sm-8">
                    {{ $agency->city->name }}
                </dd>
                <dt class="col-sm-4">Autonomía</dt>
                <dd class="col-sm-8">
                    {{ $agency->autonomy }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
