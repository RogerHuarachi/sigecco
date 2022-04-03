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
                <dl class="row">
                    <dt class="col-sm-4">Nombre de Cliente</dt>
                    <dd class="col-sm-8">
                        {{ $folder->name }}
                    </dd>
                    <dt class="col-sm-4">Asesor</dt>
                    <dd class="col-sm-8">
                        {{ $folder->user->name }}
                    </dd>
                    <dt class="col-sm-4">Monto</dt>
                    <dd class="col-sm-8">
                        {{ $folder->money }}
                    </dd>
                    <dt class="col-sm-4">Plazo</dt>
                    <dd class="col-sm-8">
                        {{ $folder->term }}
                    </dd>
                    <dt class="col-sm-4">Sexo</dt>
                    <dd class="col-sm-8">
                        @if ($folder->gender == 0)
                            MASCULINO
                        @else
                            FEMENINO
                        @endif
                    </dd>
                    <dt class="col-sm-4">Fecha de Reporte</dt>
                    <dd class="col-sm-8">
                        {{ date_format(new DateTime($folder->report), 'd/m/Y H:i:s') }}
                    </dd>
                    <dt class="col-sm-4">Fecha de Registro</dt>
                    <dd class="col-sm-8">
                        {{ date_format($folder->created_at, 'd/m/Y H:i:s') }}
                    </dd>
                    @if ($folder->observed)
                        <dt class="col-sm-4">Observacion</dt>
                        <dd class="col-sm-8">
                            <span>{{ date_format($folder->observed->created_at, 'd/m/Y H:i:s') }}</span>
                            <span>{{ $folder->observed->user->name }}</span>
                        </dd>
                    @endif
                    @if ($folder->approved)
                        <dt class="col-sm-4">Aprobacion</dt>
                        <dd class="col-sm-8">
                            <span>{{ date_format($folder->approved->created_at, 'd/m/Y H:i:s') }}</span>
                            <span>{{ $folder->approved->user->name }}</span>
                        </dd>
                    @endif
                    @if ($folder->rejected)
                        <dt class="col-sm-4">Rechazo</dt>
                        <dd class="col-sm-8">
                            <span>{{ date_format($folder->rejected->created_at, 'd/m/Y H:i:s') }}</span>
                            <span>{{ $folder->rejected->user->name }}</span>
                        </dd>
                    @endif
                    @if ($folder->disbursement)
                        <dt class="col-sm-4">Desembolso</dt>
                        <dd class="col-sm-8">
                            <span>{{ date_format($folder->disbursement->created_at, 'd/m/Y H:i:s') }}</span>
                            <span>{{ $folder->disbursement->user->name }}</span>
                        </dd>
                    @endif
                </dl>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
