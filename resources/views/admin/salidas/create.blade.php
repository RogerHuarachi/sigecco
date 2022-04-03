<div class="modal fade" id="salidaCreate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Crear Salida</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('salidas.store') }}" method="POST">
          {{ csrf_field() }}
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <label>Arqueo</label>
                        <div class="select2-primary">
                          <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="arqueo_id" required>
                            @foreach ($arqueos as $arqueo)
                                <option value="{{ $arqueo->id }}">{{ $arqueo->date }} - {{ $arqueo->agency->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="category" required>
                            <option>desembolso</option>
                            <option>fondos en custodia</option>
                            <option>reposiciones</option>
                            <option>inversiones</option>
                            <option>gastos de operación</option>
                        </select>
                    </div>
                    <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" placeholder="Item" name="item" required>
                    <br>
                    <input class="form-control" type="text" placeholder="Monto" name="money" required>
                    <br>
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
