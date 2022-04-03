@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Desembolsos</h1>
        @can('disbursements.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#disbursementImport"><i class="fas fa-upload"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.disbursements.import')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">disbursements</li>
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
                                <th>Carpeta</th>
                                @can('disbursements.update', 'disbursements.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disbursements as $disbursement)
                                <tr>
                                    <td>{{ $disbursement->folder->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('disbursements.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#disbursementDelete{{ $disbursement->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.disbursements.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $disbursements->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
