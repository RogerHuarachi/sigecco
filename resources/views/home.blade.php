@extends('layouts.app')
@section('title')
    <h1 class="m-0">Inicio</h1>
@endsection
@section('browser')
    <li class="breadcrumb-item">Inicio</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Bienvenida</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="img-fluid">
                    <img src="{{ asset('dist/img/proeza.jpg') }}" alt="">
                </div>
            </div>
            <p>
                PROEZA - SiGeCCO
                <br>
                Sistema de Gestion Comercial Contabilidad y Operaciones
                <br>
                Se creo con el proposito de brindar ayuda a las areas de:
                    <br> Comercial
                    <br> Operaciones
                    <br> Contabilidad
            </p>
        </div>
    </div>
@endsection
