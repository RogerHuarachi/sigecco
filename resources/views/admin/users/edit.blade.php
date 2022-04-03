<div class="modal fade" id="userEdit{{ $user->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
          {{ csrf_field() }}
          {{ @method_field('PUT') }}
          <div class="modal-body">
              <div class="card-body">
                    <input class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" placeholder="Nombre de Usuario" name="name" value="{{ $user->name }}" required>
                    <br>
                    <input class="form-control" type="email" placeholder="Email" name="email" value="{{ $user->email }}" required>
                    <br>
                    <input class="form-control" type="password" placeholder="Contraseña" name="password">
                    <br>
                    <input class="form-control" type="password" placeholder="Confirmar Contraseña" name="password_confirmation">
                    <br>
                    <div class="form-group">
                      <label>Rol</label>
                      @foreach ($roles as $role)
                          @if ($user->hasRole($role->name))
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="role[]"  value="{{ $role->name }}" checked>
                                  <label class="form-check-label">{{ $role->name }}</label>
                              </div>
                          @else
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}" >
                                  <label class="form-check-label">{{ $role->name }}</label>
                              </div>
                          @endif
                      @endforeach
                    </div>
                    {{-- <div class="form-group">
                        <label>Rol</label>
                        @foreach ($roles as $role)
                            @if ($user->hasRole($role->name))
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role"  value="{{ $role->name }}" checked>
                                    <label class="form-check-label">{{ $role->name }}</label>
                                </div>
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="{{ $role->name }}" >
                                    <label class="form-check-label">{{ $role->name }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div> --}}
                    <div class="form-group">
                        <label>Agencia</label>
                        <div class="select2-primary">
                          <select class="select2" data-placeholder="Select a State" data-dropdown-css-class="select2-primary" style="width: 100%;" name="agency_id" required>
                            <option value="{{ $user->agency->id }}">{{ $user->agency->name }}</option>
                            @foreach ($agencies as $agency)
                                <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"  onclick="cerraModalEditUser()">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
</div>
