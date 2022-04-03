<div class="modal fade" id="folderShow{{ $assign->folder->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalles de Carpeta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table id="example2" class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Nombre de Cliente</th>
                        <td>{{ $assign->folder->name }}</td>
                    </tr>
                    <tr>
                        <th>Asesor</th>
                        <td>{{ $assign->folder->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Monto</th>
                        <td>{{ $assign->folder->money }}</td>
                    </tr>
                    <tr>
                        <th>Plazo</th>
                        <td>{{ $assign->folder->term }}</td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td>
                            @if ($assign->folder->gender == 0)
                                MASCULINO
                            @else
                                FEMENINO
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de Reporte</th>
                        <td>{{ date_format(new DateTime($assign->folder->report), 'd/m/Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Registro</th>
                        <td>
                            <span>{{ date_format($assign->folder->created_at, 'd/m/Y H:i:s') }}</span>
                        </td>
                    </tr>
                    @if ($assign->folder->observed )
                        <tr>
                            <th>Observacion</th>
                            <td>
                                <span>{{ date_format($assign->folder->observed->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $assign->folder->observed->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                    @if ($assign->folder->approved )
                        <tr>
                            <th>Aprobacion</th>
                            <td>
                                <span>{{ date_format($assign->folder->approved->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $assign->folder->approved->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                    @if ($assign->folder->rejected )
                        <tr>
                            <th>Rechazo</th>
                            <td>
                                <span>{{ date_format($assign->folder->rejected->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $assign->folder->rejected->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                    @if ($assign->folder->disbursement )
                        <tr>
                            <th>Desembolso</th>
                            <td>
                                <span>{{ date_format($assign->folder->disbursement->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $assign->folder->disbursement->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
