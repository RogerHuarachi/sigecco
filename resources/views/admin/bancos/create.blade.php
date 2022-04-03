<div class="modal fade" id="bancoCreate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Saldo de Banco</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('bancos.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <input class="form-control" type="date" placeholder="Fecha" name="date" required>
                        <br>
                        <div class="form-group">
                            <label>Item</label>
                            <div class="select2-primary">
                            <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="item" required>
                                <option value="BNB Martha">BNB Martha</option>
                                <option value="PRODEM Martha">PRODEM Martha</option>
                                <option value="BNB Alejandro">BNB Alejandro</option>
                                <option value="PRODEM Alejandro">PRODEM Alejandro</option>
                                <option value="BNB PROEZA Bs">BNB PROEZA Bs</option>
                                <option value="BNB PROEZA $">BNB PROEZA $</option>
                            </select>
                            </div>
                        </div>
                        <input class="form-control" type="text" placeholder="Saldo en Bolivianos" name="money" required>
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
