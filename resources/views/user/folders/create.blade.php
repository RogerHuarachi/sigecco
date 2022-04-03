<div class="modal fade" id="folderCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Carpeta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('folders.storeUser') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                            <div class="form-group">
                                <label for="name">Nombre de Cliente</label>
                                <input type="text" class="form-control form-control-sm"
                                id="name" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                placeholder="NOMBRE APELLIDO" name="name" required>
                            </div>
                            </div>
                            <div class="col-5">
                            <div class="form-group">
                                <label>Sexo</label>
                                <select class="form-control form-control-sm" name="gender" required>
                                <option value=0>Masculino</option>
                                <option value=1>Femenino</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="money">Monto</label>
                                    <input type="number" class="form-control form-control-sm" id="money" name="money" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="term">Plazo</label>
                                    <input type="number" class="form-control form-control-sm" id="term" name="term" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="report">Fecha de Reporte</label>
                                    <input type="date" class="form-control form-control-sm" id="report" name="report" required>
                                </div>
                            </div>
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
