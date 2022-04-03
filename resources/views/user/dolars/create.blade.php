<div class="modal fade" id="dolarCreate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de efectivo en $</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('dolars.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="arqueo_id" required>
                                <option value="{{ $arqueo->id }}">{{ $arqueo->agency->name }}-{{ $arqueo->date }}</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">100</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard1(this.value);" value="0" name="ciend">
                        </div>
                        <div class="col-sm-4">
                            <input id="ciend" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">50</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard2(this.value);" value="0" name="cincuentad">
                        </div>
                        <div class="col-sm-4">
                            <input id="cincuentad" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">20</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard3(this.value);" value="0" name="viented">
                        </div>
                        <div class="col-sm-4">
                            <input id="viented" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">10</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard4(this.value);" value="0" name="diezd">
                        </div>
                        <div class="col-sm-4">
                            <input id="diezd" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">5</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard5(this.value);" value="0" name="cincod">
                        </div>
                        <div class="col-sm-4">
                            <input id="cincod" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard6(this.value);" value="0" name="dosd">
                        </div>
                        <div class="col-sm-4">
                            <input id="dosd" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumard7(this.value);" value="0" name="unod">
                        </div>
                        <div class="col-sm-4">
                            <input id="unod" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">Total</label>
                        <div class="col-sm-4">
                            <input id="totald" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">T.C.</label>
                        <label id="tc" class="col-sm-4 col-form-label">{{ $arqueo->tc }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">S en Bs</label>
                        <label id="totaldbs" class="col-sm-4 col-form-label"></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">Diferencia</label>
                        @if ($arqueo->boliviano)
                            <label id="totalFSd" class="col-sm-4 col-form-label">{{ ($arqueo->boliviano->totalbs) - ($arqueo->entradas->sum('money')-$arqueo->salidas->sum('money'))}}</label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
</div>
