<div class="modal fade" id="roleShow{{ $role->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de Rol</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <dl class="row">
                <dt class="col-sm-4">Nombre de Rol</dt>
                <dd class="col-sm-8">
                    {{ $role->name }}
                </dd>
                <dt class="col-sm-4">Permisos</dt>
                <dd class="col-sm-8">
                    @foreach ($role->permissions as $permission)
                        <span class="badge bg-primary">{{ $permission->name }}</span>
                    @endforeach
                </dd>
            </dl>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
