@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Dashboard</h1>
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">agencies</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h5>{{ $foldersCount }}</h5>
                    <p>Registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder-open"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h5>{{ $srCount }}</h5>
                    <p>Sin Revisar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hourglass-end"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h5>{{ $observedsCount }}</h5>
                    <p>Observados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bed"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h5>{{ $approvedsCount }}</sup></h5>
                    <p>Aprobadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder-plus"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h5>{{ $rejectedsCount }}</h5>
                    <p>Rechazadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder-minus"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h5>{{ $disbursementsCount }}</h5>
                    <p>Desembolsos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-check"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Agencia</th>
                                <th>Carpetas</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cantFolAge as $dato)
                                <tr>
                                    <td>{{ $dato->name }}</td>
                                    <td>{{ $dato->total_fol }}</td>
                                    <td>{{ $dato->total_money }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Asesor</th>
                                <th>Carpetas</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cantFolAse as $dato)
                                <tr>
                                    <td>{{ $dato->name }}</td>
                                    <td>{{ $dato->total_fol }}</td>
                                    <td>{{ $dato->total_money }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Encargado</th>
                                <th>Carpetas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cantAsigAse as $dato)
                                <tr>
                                    <td>{{ $dato->name }}</td>
                                    <td>{{ $dato->total_ass }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>Asesor</th>
                                <th>Carpetas</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cantFolAse as $dato)
                                <tr>
                                    <td>{{ $dato->name }}</td>
                                    <td>{{ $dato->total_fol }}</td>
                                    <td>{{ $dato->total_money }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
