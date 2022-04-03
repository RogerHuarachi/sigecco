@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Asignaciones</h1>
        @can('assigns.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#assignCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
        @can('assigns.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#assignImport"><i class="fas fa-upload"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.assigns.create')
    @include('admin.assigns.import')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">assigns</li>
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
                                @can('assigns.update', 'assigns.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assigns as $assign)
                                <tr>
                                    <td>{{ $assign->folder->id }}</td>
                                    <td>{{ $assign->folder->name }} {{ $assign->folder->last }}</td>
                                    <td>{{ $assign->folder->user->name }}</td>
                                    <td>{{ $assign->folder->assign->user->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#assignShow{{ $assign->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.assigns.show')
                                            @can('assigns.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#assignEdit{{ $assign->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.assigns.edit')
                                            @endcan
                                            @can('assigns.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#assignDelete{{ $assign->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.assigns.delete')
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
