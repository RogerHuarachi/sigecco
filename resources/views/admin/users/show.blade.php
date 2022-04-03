<div class="modal fade" id="userShow{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles de Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Nombre de usuario</dt>
                    <dd class="col-sm-8">
                        {{ $user->name }}
                    </dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">
                        {{ $user->email }}
                    </dd>
                    <dt class="col-sm-4">Rol</dt>
                    <dd class="col-sm-8">
                        @foreach ($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </dd>
                    <dt class="col-sm-4">Agencia</dt>
                    <dd class="col-sm-8">
                        {{ $user->agency->name }}
                    </dd>
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
