@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Cosolidado</h1>
    </div>
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">consolidado</li>
@endsection
@section('content')
    @include('option.error')
    @include('option.validation')
    @include('option.confirmation')
    <div class="row justify-content-center">
        <label>PLANILLA CONSOLIDADO</label>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="row justify-content-center m-0">
                <img class="" src="{{ asset('dist/img/proeza.jpg') }}"  width="120">
            </div>
        </div>
        <div class="col-3">
            <dl class="row">
                <dt class="col-sm-4">Fecha de Consolidado:</dt>
                <dd class="col-sm-8">
                    {{ $date }}
                </dd>
                <dt class="col-sm-4">Arqueo Consolidado</dt>
            </dl>
        </div>
        <div class="col-4">
            <dl class="row">
                <dt class="col-sm-4">Responsable:</dt>
                <dd class="col-sm-8">
                    {{ Auth::user()->name }}
                </dd>
                <dt class="col-sm-4">T.C.:</dt>
                <dd class="col-sm-8">
                    {{ $tc }} Bs.
                </dd>
            </dl>
        </div>
        <div class="col-3">
            <dl class="row">
                <dt class="col-sm-4">Fecha:</dt>
                <dd class="col-sm-8">
                    {{ date_format(new DateTime(), 'Y-m-d') }}
                </dd>
                <dt class="col-sm-4">Hora:</dt>
                <dd class="col-sm-8">
                    {{ date_format(new DateTime(), 'g:i A') }}
                </dd>
            </dl>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Total Por Agencias
                </div>
                <div class="card-body">
                    <table class="table table-light table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>PROEZA</th>
                                <th>Total Bs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Agencias</td>
                                <td>{{ number_format($totalbs + ($totald * $arqueos->avg('tc')), 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td>Bancos</td>
                                <td>{{ number_format($bancos->sum('money'), 2, '.', ',') }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th>{{ number_format($totalbs + ($totald * $arqueos->avg('tc')) +$bancos->sum('money'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Total Por Agencias
                </div>
                <div class="card-body">
                    <table class="table table-light table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>Bs</th>
                                <th>$</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arqueos as $arqueo)
                                <tr>
                                    <td>{{ $arqueo->date }}</td>
                                    <td>{{ $arqueo->agency->name }}</td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ number_format($arqueo->boliviano->totalbs, 2, '.', ',') }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ number_format($arqueo->dolar->totald * $arqueo->tc, 2, '.', ',') }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ number_format($arqueo->boliviano->totalbs + ($arqueo->dolar->totald * $arqueo->tc), 2, '.', ',') }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>{{ number_format($totalbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($totald * $arqueos->avg('tc'), 2, '.', ',') }}</th>
                                <th>{{ number_format($totalbs + ($totald * $arqueos->avg('tc')), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Consolidado En bolivianos
                </div>
                <div class="card-body">
                    <table class="table table-light table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>200</th>
                                <th>100</th>
                                <th>50</th>
                                <th>20</th>
                                <th>10</th>
                                <th>5</th>
                                <th>2</th>
                                <th>1</th>
                                <th>0.5</th>
                                <th>0.2</th>
                                <th>0.1</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arqueos as $arqueo)
                                <tr>
                                    <td>{{ $arqueo->date }}</td>
                                    <td>{{ $arqueo->agency->name }}</td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->docientos }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->cien }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->cincuenta }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->veinte }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->diez }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->cinco }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->dos }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->uno }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->cincuentacent }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->veintecent }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ $arqueo->boliviano->diezcent }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->boliviano)
                                            {{ number_format($arqueo->boliviano->totalbs, 2, '.', ',') }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>{{ number_format($docientosbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($cienbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($cincuentabs, 2, '.', ',') }}</th>
                                <th>{{ number_format($veintebs, 2, '.', ',') }}</th>
                                <th>{{ number_format($diezbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($cincobs, 2, '.', ',') }}</th>
                                <th>{{ number_format($dosbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($unobs, 2, '.', ',') }}</th>
                                <th>{{ number_format($cincuentacentbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($veintecentbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($diezcentbs, 2, '.', ',') }}</th>
                                <th>{{ number_format($totalbs, 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    Consolidado en Dolares
                </div>
                <div class="card-body">
                    <table class="table table-light table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Fecha</th>
                                <th>Agencia</th>
                                <th>100</th>
                                <th>50</th>
                                <th>20</th>
                                <th>10</th>
                                <th>5</th>
                                <th>2</th>
                                <th>1</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arqueos as $arqueo)
                                <tr>
                                    <td>{{ $arqueo->date }}</td>
                                    <td>{{ $arqueo->agency->name }}</td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->ciend }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->cincuentad }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->viented }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->diezd }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->cincod }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->dosd }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ $arqueo->dolar->unod }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if ($arqueo->dolar)
                                            {{ number_format($arqueo->dolar->totald, 2, '.', ',') }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>{{ number_format($ciend, 2, '.', ',') }}</th>
                                <th>{{ number_format($cincuentad, 2, '.', ',') }}</th>
                                <th>{{ number_format($veinted, 2, '.', ',') }}</th>
                                <th>{{ number_format($diezd, 2, '.', ',') }}</th>
                                <th>{{ number_format($cincod, 2, '.', ',') }}</th>
                                <th>{{ number_format($dosd, 2, '.', ',') }}</th>
                                <th>{{ number_format($unod, 2, '.', ',') }}</th>
                                <th>{{ number_format($totald, 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-header">
                    Total Saldo en Bancos
                </div>
                <div class="card-body">
                    <table class="table table-light table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Fecha</th>
                                <th>Banco</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bancos as $banco)
                                <tr>
                                    <td>{{ $banco->date }}</td>
                                    <td>{{ $banco->item }}</td>
                                    <td>{{ number_format($banco->money, 2, '.', ',') }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>{{ number_format($bancos->sum('money'), 2, '.', ',') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
