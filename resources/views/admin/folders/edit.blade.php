<div class="modal fade" id="folderEdit{{ $folder->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Carpeta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('folders.update', $folder->id) }}" method="POST">
                {{ csrf_field() }}
                {{ @method_field('PUT') }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <div class="select2-primary">
                                        <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="user_id" required>
                                            <option value="{{ $folder->user->id }}">{{ $folder->user->name }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="name">Nombre de Cliente</label>
                                    <input type="text" class="form-control form-control-sm"
                                    id="name" onkeyup="javascript:this.value=this.value.toUpperCase();"
                                    placeholder="NOMBRE APELLIDO" name="name" value="{{ $folder->name }}" required>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="form-control form-control-sm" name="gender" required>
                                    @if ($folder->gender == 0)
                                        <option value="{{ $folder->gender }}">Masculino</option>
                                        <option value=1>Femenino</option>
                                    @else
                                        <option value="{{ $folder->gender }}">Femenino</option>
                                        <option value=0>Masculino</option>
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="money">Monto</label>
                                    <input type="number" class="form-control form-control-sm" id="money" name="money" value="{{ $folder->money }}" required>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="term">Plazo</label>
                                    <input type="number" class="form-control form-control-sm" id="term" name="term" value="{{ $folder->term }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="report">Fecha de Reporte</label>
                                    <input type="text" class="form-control form-control-sm" id="report" name="report" value="{{ $folder->report }}" required>
                                </div>
                            </div>
                        </div>
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
