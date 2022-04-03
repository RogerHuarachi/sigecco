@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Saldo de Banco</h1>
        @can('bancos.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#bancoCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.bancos.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">bancos</li>
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
                                <th>Item</th>
                                <th>Monto</th>
                                @can('bancos.update', 'bancos.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bancos as $banco)
                                <tr>
                                    <td>{{ $banco->date }}</td>
                                    <td>{{ $banco->item }}</td>
                                    <td>{{ $banco->money }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('bancos.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#bancoEdit{{ $banco->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.bancos.edit')
                                            @endcan
                                            @can('bancos.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#bancoDelete{{ $banco->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.bancos.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $bancos->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
