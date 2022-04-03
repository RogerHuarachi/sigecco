<div class="modal fade" id="arqueoShow{{ $arqueo->id }}">
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
                <dt class="col-sm-5">Entradas</dt>
                <dd class="col-sm-7">
                    @if ($arqueo->entradas)
                        {{ $arqueo->entradas->sum('money') }}
                    @endif
                </dd>
                <dt class="col-sm-5">Salida</dt>
                <dd class="col-sm-7">
                    @if ($arqueo->salidas)
                        {{ $arqueo->salidas->sum('money') }}
                    @endif
                </dd>
                <dt class="col-sm-5">Saldo de caja en cierre</dt>
                <dd class="col-sm-7">
                    @if ($arqueo->salidas)
                        {{ $arqueo->entradas->sum('money') - $arqueo->salidas->sum('money') }}
                    @endif
                </dd>
                <dt class="col-sm-5">Bolivianos</dt>
                <dd class="col-sm-7">
                    @if ($arqueo->boliviano)
                        {{ $arqueo->boliviano->totalbs }}
                    @endif
                </dd>
                <dt class="col-sm-5">Dolares</dt>
                <dd class="col-sm-7">
                    @if ($arqueo->dolar)
                        {{ $arqueo->dolar->totald * $arqueo->tc }}
                    @endif
                </dd>
                <dt class="col-sm-5">En caja</dt>
                <dd class="col-sm-7">
                    @if ($arqueo->dolar)
                        {{ $arqueo->boliviano->totalbs + ($arqueo->dolar->totald * $arqueo->tc) }}
                    @endif
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
