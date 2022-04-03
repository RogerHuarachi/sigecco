@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Permisos</h1>
        @can('permissions.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#permissionCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.permissions.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">permisos</li>
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
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                @can('permissions.update', 'permissions.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('permissions.update')
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#permissionEdit{{ $permission->id }}"><i class="fas fa-pen"></i></button>
                                                @include('admin.permissions.edit')
                                            @endcan
                                            @can('permissions.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#permissionDelete{{ $permission->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.permissions.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
