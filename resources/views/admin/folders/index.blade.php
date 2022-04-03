@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Carpetas</h1>
        @can('folders.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#folderCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
        @can('folders.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#folderImport"><i class="fas fa-upload"></i></button>
            </ol>
        @endcan
        @can('folders.destroy')
            <ol class="breadcrumb float-sm-right pr-2">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#folderDeleteAll"><i class="fas fa-minus"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.folders.create')
    @include('admin.folders.import')
    @include('admin.folders.deleteall')
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
                            @foreach ($folders as $folder)
                                <tr>
                                    <td>{{ $folder->id }}</td>
                                    <td>{{ $folder->name }} {{ $folder->last }}</td>
                                    <td>{{ $folder->user->name }}</td>
                                    @if ($folder->assign)
                                        <td>{{ $folder->assign->user->name }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        @if ($folder->observed)
                                            <span class="badge bg-warning">OBSERVADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($folder->approved)
                                            <span class="badge bg-success">APROBADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($folder->rejected)
                                            <span class="badge bg-danger">RECHAZADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($folder->disbursement)
                                            <span class="badge bg-success">DESEMBOLSADO</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($folder->approved || $folder->rejected)
                                            @if ($folder->approved)
                                                <?php
                                                $date1=new DateTime($folder->created_at);
                                                $date2=new DateTime($folder->approved->created_at);
                                                $diff=date_diff($date1,$date2);
                                                ?>
                                                @if ($diff->format("%R%d") <= 1)
                                                    <span class="badge bg-success">{{ $diff->format("%d d %h h") }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ $diff->format("%d d %h h") }}</span>
                                                @endif
                                            @elseif ($folder->rejected)
                                                <?php
                                                $date1=new DateTime($folder->created_at);
                                                $date2=new DateTime($folder->rejected->created_at);
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
                                            $date1=new DateTime($folder->created_at);
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
                                        @if ($folder->rejected)
                                            <span class="badge bg-success"><i class="fas fa-thumbs-up"></i></span>
                                        @elseif ($folder->disbursement)
                                            <?php
                                            $date1=new DateTime($folder->created_at);
                                            $date2=new DateTime($folder->disbursement->created_at);
                                            $diff=date_diff($date1,$date2);
                                            ?>
                                            @if ($diff->format("%R%a") > 3)
                                                <span class="badge bg-danger">{{ $diff->format("%a d") }}</span>
                                            @else
                                                <span class="badge bg-success"><i class="fas fa-thumbs-up"></i></span>
                                            @endif
                                        @else
                                            <?php
                                            $date1=new DateTime($folder->created_at);
                                            $date2=new DateTime('now');
                                            $diff=date_diff($date1,$date2);
                                            ?>
                                            @if ($diff->format("%R%a") == 2)
                                                <span class="badge bg-warning">{{ $diff->format("%a d") }}</span>
                                            @elseif ($diff->format("%R%a") > 2)
                                                <span class="badge bg-danger">{{ $diff->format("%a d") }}</span>
                                            @else
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#folderShow{{ $folder->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.folders.show')
                                            @can('folders.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#folderEdit{{ $folder->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.folders.edit')
                                            @endcan
                                            @can('folders.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#folderDelete{{ $folder->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.folders.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $folders->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
