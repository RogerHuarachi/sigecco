<div class="modal fade" id="salidaEdit{{ $salida->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Salida</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('salidas.update', $salida->id) }}" method="POST" class="text-center">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="arqueo_id" required>
                                    <option value="{{ $salida->arqueo->id }}">{{ $salida->arqueo->agency->name }}-{{ $salida->arqueo->date }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="category" required>
                                <option value="{{ $salida->category }}">{{ $salida->category }}</option>
                            </select>
                        </div>
                        <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" placeholder="Item" name="item" value="{{ $salida->item }}" required>
                        <br>
                        <input class="form-control" type="text" placeholder="Monto" name="money" value="{{ $salida->money }}" required>
                        <br>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
