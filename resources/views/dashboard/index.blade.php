@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Dashboard</h1>
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">fecha</li>
@endsection
@section('content')
    @include('option.error')
    @include('option.validation')
    @include('option.confirmation')
    <div class="row">
        <div class="card-body">
            <form action="{{ route('dashboard.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                          <label>Fecha inicial</label>
                          <input type="date" class="form-control" name="inicio">
                        </div>
                        <div class="form-group">
                          <label>Fecha final</label>
                          <input type="date" class="form-control" name="fin">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
