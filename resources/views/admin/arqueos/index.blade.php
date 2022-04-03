@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">arqueos</h1>
        @can('arqueos.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#arqueoCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
        @can('entradas.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#entradaImport"><i class="fas fa-upload"></i>Entradas</button>
            </ol>
        @endcan
        @can('salidas.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#salidaImport"><i class="fas fa-upload"></i>Salidas</button>
            </ol>
        @endcan
    </div>
    @include('admin.arqueos.create')
    @include('admin.entradas.import')
    @include('admin.salidas.import')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">arqueos</li>
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
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>Usuario</th>
                                @can('arqueos.update', 'arqueos.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arqueos as $arqueo)
                                <tr>
                                    <td>{{ $arqueo->date }}</td>
                                    <td>{{ $arqueo->agency->name }}</td>
                                    <td>{{ $arqueo->user->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('arqueos.print', $arqueo->id) }}" method="GET">
                                                <button class="btn btn-primary btn-xs" type="submit"><i class="fas fa-print"></i></button>
                                            </form>
                                            <form action="{{ route('arqueos.showUser', $arqueo->id) }}" method="GET">
                                                <button class="btn btn-info btn-xs" type="submit"><i class="fas fa-eye"></i></button>
                                            </form>
                                            {{-- <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#arqueoShow{{ $arqueo->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.arqueos.show')
                                            @can('arqueos.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#arqueoEdit{{ $arqueo->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.arqueos.edit')
                                            @endcan --}}
                                            @can('arqueos.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#arqueoDelete{{ $arqueo->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.arqueos.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $arqueos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

