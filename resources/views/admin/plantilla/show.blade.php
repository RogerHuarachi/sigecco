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
            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Nombre de Rol</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>Permisos</th>
                        <td>
                          @foreach ($role->permissions as $permission)
                            <span class="badge bg-primary">{{ $permission->name }}</span>
                          @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
