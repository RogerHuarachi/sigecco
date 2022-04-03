@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Carpetas</h1>
    </div>
    @include('user.folders.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">folders</li>
@endsection
@section('content')
    @include('option.error')
    @include('option.validation')
    @include('option.confirmation')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    {{-- <table id="example1" class="table table-bordered table-striped table-sm"> --}}
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Asesor</th>
                                <th>Encargado</th>
                                <th>Observado</th>
                                <th>Aprobado</th>
                                <th>Rechazado</th>
                                <th>Desembosado</th>
                                <th>Rev</th>
                                <th>Des</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $assign)
                                <tr>
                                    <td>{{ $assign->folder->id }}</td>
                                    <td>{{ $assign->folder->name }}</td>
                                    <td>{{ $assign->folder->user->name }}</td>
                                    @if ($assign)
                                        <td>{{ $assign->user->name }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        @if ($assign->folder->observed)
                                            <span class="badge bg-warning">OBSERVADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($assign->folder->approved)
                                            <span class="badge bg-success">APROBADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($assign->folder->rejected)
                                            <span class="badge bg-danger">RECHAZADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($assign->folder->disbursement)
                                            <span class="badge bg-success">DESEMBOLSADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($assign->folder->approved || $assign->folder->rejected)
                                            @if ($assign->folder->approved)
                                                <?php
                                                $date1=new DateTime($assign->folder->created_at);
                                                $date2=new DateTime($assign->folder->approved->created_at);
                                                $diff=date_diff($date1,$date2);
                                                ?>
                                                @if ($diff->format("%R%d") <= 1)
                                                    <span class="badge bg-success">{{ $diff->format("%d d %h h") }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ $diff->format("%d d %h h") }}</span>
                                                @endif
                                            @elseif ($assign->folder->rejected)
                                                <?php
                                                $date1=new DateTime($assign->folder->created_at);
                                                $date2=new DateTime($assign->folder->rejected->created_at);
                                                $diff=date_diff($date1,$date2);
                                                ?>
                                                @if ($diff->format("%R%d") <= 1)
                                                    <span class="badge bg-success">{{ $diff->format("%d d %h h") }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ $diff->format("%d d %h h") }}</span>
                                                @endif
                                            @endif
                                        @else
                                            <?php
                                            $date1=new DateTime($assign->folder->created_at);
                                            $date2=new DateTime('now');
                                            $diff=date_diff($date1,$date2);
                                            ?>
                                            @if ($diff->format("%R%d") <= 1)
                                                <span class="badge bg-success">{{ $diff->format("%d d %h h") }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $diff->format("%d d %h h") }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($assign->folder->rejected)
                                            <span class="badge bg-success"><i class="fas fa-thumbs-up"></i></span>
                                        @elseif ($assign->folder->disbursement)
                                            <?php
                                            $date1=new DateTime($assign->folder->created_at);
                                            $date2=new DateTime($assign->folder->disbursement->created_at);
                                            $diff=date_diff($date1,$date2);
                                            ?>
                                            @if ($diff->format("%R%a") > 3)
                                                <span class="badge bg-danger">{{ $diff->format("%R%a dias") }}</span>
                                            @else
                                                <span class="badge bg-success"><i class="fas fa-thumbs-up"></i></span>
                                            @endif
                                        @else
                                            <?php
                                            $date1=new DateTime($assign->folder->created_at);
                                            $date2=new DateTime('now');
                                            $diff=date_diff($date1,$date2);
                                            ?>
                                            @if ($diff->format("%R%a") == 2)
                                                <span class="badge bg-warning">{{ $diff->format("%R%a dias") }}</span>
                                            @elseif ($diff->format("%R%a") > 2)
                                                <span class="badge bg-danger">{{ $diff->format("%R%a dias") }}</span>
                                            @else
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#folderShow{{ $assign->folder->id }}"><i class="fas fa-eye"></i></button>
                                            @include('user.folders.show')
                                            @can('folders.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#folderEdit{{ $assign->folder->id }}"><i class="fas fa-pen"></i></button>
                                                @include('user.folders.edit')
                                            @endcan
                                            @can('folders.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#folderDelete{{ $assign->folder->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('user.folders.delete')
                                            @endcan
                                        </div>
                                        <div class="btn-group">
                                            @can('observeds.store')
                                                @if (!$assign->folder->observed && !$assign->folder->rejected && !$assign->folder->approved)
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#observedCreate{{ $assign->folder->id }}"><i class="far fa-question-circle"></i></button>
                                                    @include('user.observeds.create')
                                                @endif
                                            @endcan
                                            @can('approveds.store')
                                                @if (!$assign->folder->approved && !$assign->folder->rejected)
                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvedCreate{{ $assign->folder->id }}"><i class="far fa-check-square"></i></button>
                                                    @include('user.approveds.create')
                                                @endif
                                            @endcan
                                            @can('rejecteds.store')
                                                @if (!$assign->folder->rejected && !$assign->folder->approved)
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#rejectedCreate{{ $assign->folder->id }}"><i class="far fa-window-close"></i></button>
                                                    @include('user.rejecteds.create')
                                                @endif
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $assigns->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
