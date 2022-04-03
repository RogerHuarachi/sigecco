@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Salidas</h1>
        @can('salidas.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#salidaCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.salidas.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">salidas</li>
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
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>Categoria</th>
                                <th>Item</th>
                                @can('salidas.update', 'salidas.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salidas as $salida)
                                <tr>
                                    <td>{{ $salida->id }}</td>
                                    <td>{{ $salida->arqueo->date }}</td>
                                    <td>{{ $salida->arqueo->agency->name }}</td>
                                    <td>{{ $salida->category }}</td>
                                    <td>{{ $salida->item }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#salidaShow{{ $salida->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.salidas.show')
                                            @can('salidas.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#salidaEdit{{ $salida->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.salidas.edit')
                                            @endcan
                                            @can('salidas.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#salidaDelete{{ $salida->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.salidas.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $salidas->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
