@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">entradas</h1>
        @can('entradas.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#entradaCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.entradas.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">entradas</li>
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
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>Categoria</th>
                                <th>Item</th>
                                @can('entradas.update', 'entradas.destroy')
                                    <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entradas as $entrada)
                                <tr>
                                    <td>{{ $entrada->arqueo->date }}</td>
                                    <td>{{ $entrada->arqueo->agency->name }}</td>
                                    <td>{{ $entrada->category }}</td>
                                    <td>{{ $entrada->item }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#entradaShow{{ $entrada->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.entradas.show')
                                            @can('entradas.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#entradaEdit{{ $entrada->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.entradas.edit')
                                            @endcan
                                            @can('entradas.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#entradaDelete{{ $entrada->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.entradas.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $entradas->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
