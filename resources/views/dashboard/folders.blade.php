
@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Carpetas</h1>
        </div>
      </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table  id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Genero</th>
                                    <th>Monto</th>
                                    <th>Plazo</th>

                                    <th>Agencia</th>
                                    <th>Asesor</th>
                                    <th>Encargado</th>

                                    <th>Fecha Rep</th>
                                    <th>Fecha Reg</th>

                                    <th>Observacion</th>
                                    <th>Fecha Obs</th>

                                    <th>Aprobacion</th>
                                    <th>Fecha Apr</th>

                                    <th>Rechazo</th>
                                    <th>Fecha Rec</th>

                                    <th>Desembolso</th>
                                    <th>Fecha Des</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($folders as $folder)
                                    <tr>
                                        <td>{{ $folder->id }}</td>
                                        <td>{{ $folder->name }} {{ $folder->last }}</td>
                                        <td>
                                            @if ($folder->gender == 0)
                                                Masculino
                                            @else
                                                Femenino
                                            @endif
                                        </td>
                                        <td>{{ $folder->money }}</td>
                                        <td>{{ $folder->term }}</td>

                                        <td>{{ $folder->user->agency->name }}</td>
                                        <td>{{ $folder->user->name }}</td>
                                        <td>{{ $folder->assign->user->name }}</td>

                                        <td>{{  strval(date_format(new DateTime($folder->report), 'Y-m-d H:i:s')) }}</td>
                                        <td>{{  strval(date_format(new DateTime($folder->created_at), 'Y-m-d H:i:s')) }}</td>

                                        <td>
                                            @if ($folder->observed)
                                                {{ $folder->observed->user->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($folder->observed)
                                                {{  strval(date_format(new DateTime($folder->observed->created_at), 'Y-m-d H:i:s')) }}
                                            @endif
                                        </td>

                                        <td>
                                            @if ($folder->approved)
                                                {{ $folder->approved->user->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($folder->approved)
                                                {{  strval(date_format(new DateTime($folder->approved->created_at), 'Y-m-d H:i:s')) }}
                                            @endif
                                        </td>

                                        <td>
                                            @if ($folder->rejected)
                                                {{ $folder->rejected->user->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($folder->rejected)
                                                {{  strval(date_format(new DateTime($folder->rejected->created_at), 'Y-m-d H:i:s')) }}
                                            @endif
                                        </td>

                                        <td>
                                            @if ($folder->disbursement)
                                                {{ $folder->disbursement->user->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($folder->disbursement)
                                                {{  strval(date_format(new DateTime($folder->disbursement->created_at), 'Y-m-d H:i:s')) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
