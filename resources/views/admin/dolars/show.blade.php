<div class="modal fade" id="dolarShow{{ $dolar->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de dolar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-5">Fecha</dt>
                <dd class="col-sm-7">
                    {{ $dolar->arqueo->date }}
                </dd>
                <dt class="col-sm-5">Agencia</dt>
                <dd class="col-sm-7">
                    {{ $dolar->arqueo->agency->name }}
                </dd>
                <dt class="col-sm-5">100</dt>
                <dd class="col-sm-7">
                    {{ $dolar->ciend }} = {{ $dolar->ciend * 100 }}
                </dd>
                <dt class="col-sm-5">50</dt>
                <dd class="col-sm-7">
                    {{ $dolar->cincuentad }} = {{ $dolar->cincuentad * 50 }}
                </dd>
                <dt class="col-sm-5">20</dt>
                <dd class="col-sm-7">
                    {{ $dolar->viented }} = {{ $dolar->viented * 20 }}
                </dd>
                <dt class="col-sm-5">10</dt>
                <dd class="col-sm-7">
                    {{ $dolar->diezd }} = {{ $dolar->diezd * 10 }}
                </dd>
                <dt class="col-sm-5">5</dt>
                <dd class="col-sm-7">
                    {{ $dolar->cincod }} = {{ $dolar->cincod * 5 }}
                </dd>
                <dt class="col-sm-5">2</dt>
                <dd class="col-sm-7">
                    {{ $dolar->dosd }} = {{ $dolar->dosd * 2 }}
                </dd>
                <dt class="col-sm-5">1</dt>
                <dd class="col-sm-7">
                    {{ $dolar->unod }} = {{ $dolar->unod * 1 }}
                </dd>
                <dt class="col-sm-5">total</dt>
                <dd class="col-sm-7">
                    {{ $dolar->totald }}
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
