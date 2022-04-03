<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body style="font-size: smaller ">
    @foreach ($arqueos as $arqueo)
        <div class="row justify-content-center">
            <label>PLANILLA CONSOLIDADA DE CAJA</label>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="row justify-content-center m-0">
                    <img class="" src="{{ asset('dist/img/proeza.jpg') }}"  width="100">
                </div>
            </div>
            <div class="col-3">
                <dl class="row">
                    <dt class="col-sm-4">Ciudad:</dt>
                    <dd class="col-sm-8">
                        {{ $arqueo->agency->city->name }}
                    </dd>
                    <dt class="col-sm-4">Agencia:</dt>
                    <dd class="col-sm-8">
                        {{ $arqueo->agency->name }}
                    </dd>
                </dl>
            </div>
            <div class="col-4">
                <dl class="row">
                    <dt class="col-sm-4">Responsable:</dt>
                    <dd class="col-sm-8">
                        {{ $arqueo->user->name }}
                    </dd>
                    <dt class="col-sm-4">Encargado:</dt>
                    <dd class="col-sm-8">
                        {{ Auth::user()->name }}
                    </dd>
                </dl>
            </div>
            <div class="col-1">
                <dl class="row">
                    <dt class="col-sm-4">T.C.:</dt>
                    <dd class="col-sm-8">
                        {{ $arqueo->tc }} Bs.
                    </dd>
                </dl>
            </div>
            <div class="col-2">
                <dl class="row">
                    <dt class="col-sm-4">Fecha:</dt>
                    <dd class="col-sm-8">
                        {{ $arqueo->date }}
                    </dd>
                    <dt class="col-sm-4">Hora:</dt>
                    <dd class="col-sm-8">
                        {{ date_format(new DateTime(), 'g:i A') }}
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row justify-content-center">
            <label>SALDO DE CAJA EN CIERRE: {{ $arqueo->entradas->sum('money')-$arqueo->salidas->sum('money') }} Bs.</label>
        </div>
        <div class="row">
            <div class="col-6">
                <label>Entradas</label>
                <table class="table table-sm table-bordered">
                    <thead class="">
                        <tr>
                            <th>Categoria</th>
                            <th>Item</th>
                            <th>monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arqueo->entradas as $entrada)
                            <tr>
                                <td>{{ $entrada->category }}</td>
                                <td>{{ $entrada->item }}</td>
                                <td>{{ $entrada->money }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Total</th>
                            <th>{{ $arqueo->entradas->sum('money') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-6">
                <label>Salidas</label>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Item</th>
                            <th>monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($arqueo->salidas as $salida)
                            <tr>
                                <td>{{ $salida->category }}</td>
                                <td>{{ $salida->item }}</td>
                                <td>{{ $salida->money }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Total</th>
                            <th>{{ $arqueo->salidas->sum('money') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            @if ($arqueo->boliviano)
                <label>DETALLES DE CAJA: {{ $arqueo->boliviano->totalbs + ($arqueo->dolar->totald * $arqueo->tc)}} Bs.</label>
            @endif
        </div>
        <div class="row">
            <div class="col-6">
                <label>BOLIVIANOS</label>
                @if ($arqueo->boliviano)
                    <table class="table table-sm table-bordered">
                        <thead class="">
                            <tr>
                                <th>Corte</th>
                                <th>Unidades</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>200</td>
                                <td>{{ $arqueo->boliviano->docientos }}</td>
                                <td>{{ $arqueo->boliviano->docientos*200 }}</td>
                            </tr>
                            <tr>
                                <td>100</td>
                                <td>{{ $arqueo->boliviano->cien }}</td>
                                <td>{{ $arqueo->boliviano->cien*100 }}</td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>{{ $arqueo->boliviano->cincuenta }}</td>
                                <td>{{ $arqueo->boliviano->cincuenta*50 }}</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>{{ $arqueo->boliviano->veinte }}</td>
                                <td>{{ $arqueo->boliviano->veinte*20 }}</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>{{ $arqueo->boliviano->diez }}</td>
                                <td>{{ $arqueo->boliviano->diez*10 }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $arqueo->boliviano->cinco }}</td>
                                <td>{{ $arqueo->boliviano->cinco*5 }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>{{ $arqueo->boliviano->dos }}</td>
                                <td>{{ $arqueo->boliviano->dos*2 }}</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $arqueo->boliviano->uno }}</td>
                                <td>{{ $arqueo->boliviano->uno*1 }}</td>
                            </tr>
                            <tr>
                                <td>0.5</td>
                                <td>{{ $arqueo->boliviano->cincuentacent }}</td>
                                <td>{{ $arqueo->boliviano->cincuentacent*0.5 }}</td>
                            </tr>
                            <tr>
                                <td>0.2</td>
                                <td>{{ $arqueo->boliviano->veintecent }}</td>
                                <td>{{ $arqueo->boliviano->veintecent*0.2 }}</td>
                            </tr>
                            <tr>
                                <td>0.1</td>
                                <td>{{ $arqueo->boliviano->diezcent }}</td>
                                <td>{{ $arqueo->boliviano->diezcent*0.1 }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>{{ $arqueo->boliviano->totalbs }}</th>
                            </tr>
                        </tfoot>
                    </table>
                @endif
            </div>
            <div class="col-6">
                <label>DOLARES</label>
                @if ($arqueo->dolar)
                    <table class="table table-sm table-bordered">
                        <thead class="">
                            <tr>
                                <th>Corte</th>
                                <th>Unidades</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>100</td>
                                <td>{{ $arqueo->dolar->ciend }}</td>
                                <td>{{ $arqueo->dolar->ciend*100 }}</td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>{{ $arqueo->dolar->cincuentad }}</td>
                                <td>{{ $arqueo->dolar->cincuentad*50 }}</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>{{ $arqueo->dolar->viented }}</td>
                                <td>{{ $arqueo->dolar->viented*20 }}</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>{{ $arqueo->dolar->diezd }}</td>
                                <td>{{ $arqueo->dolar->diezd*10 }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{ $arqueo->dolar->cincod }}</td>
                                <td>{{ $arqueo->dolar->cincod*5 }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>{{ $arqueo->dolar->dosd }}</td>
                                <td>{{ $arqueo->dolar->dosd*2 }}</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $arqueo->dolar->unod }}</td>
                                <td>{{ $arqueo->dolar->unod*1 }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>{{ $arqueo->dolar->totald }}</th>
                            </tr>
                        </tfoot>
                    </table>
                @endif
            </div>
        </div>
        
        <div class="row text-center">
            <div class="col">
                <label>_____________________________________________________________________________________________________________________________</label>
            </div>
        </div>
    @endforeach
</body>
</html>
