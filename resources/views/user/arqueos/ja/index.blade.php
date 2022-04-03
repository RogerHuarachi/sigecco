@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">arqueos</h1>
    </div>
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
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arqueos as $arqueo)
                                    <tr>
                                        <td>{{ $arqueo->date }}</td>
                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <form action="{{ route('arqueos.showja', $arqueo->id) }}" method="GET">
                                                    <button class="btn btn-info btn-xs" type="submit"><i class="fas fa-eye"></i></button>
                                                </form>
                                                <form action="{{ route('arqueos.print', $arqueo->id) }}" method="GET">
                                                    <button class="btn btn-primary btn-xs" type="submit"><i class="fas fa-print"></i></button>
                                                </form>
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
