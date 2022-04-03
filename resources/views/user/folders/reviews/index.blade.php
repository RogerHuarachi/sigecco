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
