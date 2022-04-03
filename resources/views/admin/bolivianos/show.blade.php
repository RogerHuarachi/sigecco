<div class="modal fade" id="bolivianoShow{{ $boliviano->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de boliviano</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-5">Fecha</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->arqueo->date }}
                </dd>
                <dt class="col-sm-5">Agencia</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->arqueo->agency->name }}
                </dd>
                <dt class="col-sm-5">200</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->docientos }} = {{ $boliviano->docientos * 200 }}
                </dd>
                <dt class="col-sm-5">100</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->cien }} = {{ $boliviano->cien * 100 }}
                </dd>
                <dt class="col-sm-5">50</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->cincuenta }} = {{ $boliviano->cincuenta * 50 }}
                </dd>
                <dt class="col-sm-5">20</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->veinte }} = {{ $boliviano->veinte * 20 }}
                </dd>
                <dt class="col-sm-5">10</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->diez }} = {{ $boliviano->diez * 10 }}
                </dd>
                <dt class="col-sm-5">5</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->cinco }} = {{ $boliviano->cinco * 5 }}
                </dd>
                <dt class="col-sm-5">2</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->dos }} = {{ $boliviano->dos * 2 }}
                </dd>
                <dt class="col-sm-5">1</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->uno }} = {{ $boliviano->uno * 1 }}
                </dd>
                <dt class="col-sm-5">0.5</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->cincuentacent }} = {{ $boliviano->cincuentacent * 0.5 }}
                </dd>
                <dt class="col-sm-5">0.2</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->veintecent }} ={{ $boliviano->veintecent * 0.2 }}
                </dd>
                <dt class="col-sm-5">0.1</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->diezcent }} ={{ $boliviano->diezcent * 0.1 }}
                </dd>
                <dt class="col-sm-5">total</dt>
                <dd class="col-sm-7">
                    {{ $boliviano->totalbs }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
