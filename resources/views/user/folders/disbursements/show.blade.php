<div class="modal fade" id="folderShow{{ $folder->id }}">
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
                        <td>{{ $folder->name }}</td>
                    </tr>
                    <tr>
                        <th>Asesor</th>
                        <td>{{ $folder->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Monto</th>
                        <td>{{ $folder->money }}</td>
                    </tr>
                    <tr>
                        <th>Plazo</th>
                        <td>{{ $folder->term }}</td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td>
                            @if ($folder->gender == 0)
                                MASCULINO
                            @else
                                FEMENINO
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de Reporte</th>
                        <td>{{ date_format(new DateTime($folder->report), 'd/m/Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de Registro</th>
                        <td>
                            <span>{{ date_format($folder->created_at, 'd/m/Y H:i:s') }}</span>
                        </td>
                    </tr>
                    @if ($folder->observed )
                        <tr>
                            <th>Observacion</th>
                            <td>
                                <span>{{ date_format($folder->observed->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $folder->observed->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                    @if ($folder->approved )
                        <tr>
                            <th>Aprobacion</th>
                            <td>
                                <span>{{ date_format($folder->approved->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $folder->approved->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                    @if ($folder->rejected )
                        <tr>
                            <th>Rechazo</th>
                            <td>
                                <span>{{ date_format($folder->rejected->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $folder->rejected->user->name }}</span>
                            </td>
                        </tr>
                    @endif
                    @if ($folder->disbursement )
                        <tr>
                            <th>Desembolso</th>
                            <td>
                                <span>{{ date_format($folder->disbursement->created_at, 'd/m/Y H:i:s') }}</span>
                                <span>{{ $folder->disbursement->user->name }}</span>
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
