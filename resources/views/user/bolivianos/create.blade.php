<div class="modal fade" id="bolivianoCreate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de efectivo en Bs</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('bolivianos.store') }}" method="POST">
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
                        <label class="col-sm-2">Corte</label>
                        <label class="col-sm-6">Unidades</label>
                        <label class="col-sm-4">Monto</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">200</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar1(this.value);" value="0" name="docientos">
                        </div>
                        <div class="col-sm-4">
                            <input id="docientos" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">100</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar2(this.value);" value="0" name="cien">
                        </div>
                        <div class="col-sm-4">
                            <input id="cien" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">50</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar3(this.value);" value="0" name="cincuenta">
                        </div>
                        <div class="col-sm-4">
                            <input id="cincuenta" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">20</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar4(this.value);" value="0" name="veinte">
                        </div>
                        <div class="col-sm-4">
                            <input id="veinte" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">10</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar5(this.value);" value="0" name="diez">
                        </div>
                        <div class="col-sm-4">
                            <input id="diez" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">5</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar6(this.value);" value="0" name="cinco">
                        </div>
                        <div class="col-sm-4">
                            <input id="cinco" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar7(this.value);" value="0" name="dos">
                        </div>
                        <div class="col-sm-4">
                            <input id="dos" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar8(this.value);" value="0" name="uno">
                        </div>
                        <div class="col-sm-4">
                            <input id="uno" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">0.5</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar9(this.value);" value="0" name="cincuentacent">
                        </div>
                        <div class="col-sm-4">
                            <input id="cincuentacent" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">0.2</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar10(this.value);" value="0" name="veintecent">
                        </div>
                        <div class="col-sm-4">
                            <input id="veintecent" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">0.1</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" onchange="sumar11(this.value);" value="0" name="diezcent">
                        </div>
                        <div class="col-sm-4">
                            <input id="diezcent" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">Total</label>
                        <div class="col-sm-4">
                            <input id="totalbs" class="form-control" type="text" readonly="readonly" value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">Cierre</label>
                        <label class="col-sm-4 col-form-label">{{ $arqueo->entradas->sum('money')-$arqueo->salidas->sum('money') }}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label">Diferencia</label>
                        <label id="totalFS" class="col-sm-4 col-form-label"></label>
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
