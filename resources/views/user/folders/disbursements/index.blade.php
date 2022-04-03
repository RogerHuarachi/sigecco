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
                    <table id="example1" class="table table-bordered table-striped table-sm">
                    {{-- <table class="table table-bordered table-striped table-sm"> --}}
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
                            @foreach ($folders as $folder)
                                <tr>
                                    <td>{{ $folder->id }}</td>
                                    <td>{{ $folder->name }}</td>
                                    <td>{{ $folder->user->name }}</td>
                                    @if ($folder->assign)
                                        <td>{{ $folder->user->name }}</td>
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
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#folderShow{{ $folder->id }}"><i class="fas fa-eye"></i></button>
                                            @include('user.folders.disbursements.show')
                                        </div>
                                        <div class="btn-group">
                                            @if ($folder->approved && !$folder->disbursement)
                                                @can('disbursements.store')
                                                    <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#disbursementCreate{{ $folder->id }}"><i class="fas fa-money-bill-wave"></i></button>
                                                    @include('user.disbursements.create')
                                                @endcan
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {{-- {!! $folders->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
