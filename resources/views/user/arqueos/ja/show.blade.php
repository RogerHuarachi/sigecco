@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">Detalle de Arqueo</h1>
        @if (strtotime(date("G:i")) <= strtotime(date("G:i", mktime(20, 45))))
            @can('entradas.store')
                @if (!$arqueo->dolar)
                    <ol class="breadcrumb float-sm-right pl-2">
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#entradaCreate">Entradas</button>
                    </ol>
                @endif
            @endcan
            @can('salidas.store')
                @if (!$arqueo->dolar)
                    <ol class="breadcrumb float-sm-right pl-2">
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#salidaCreate">Salidas</button>
                    </ol>
                @endif
            @endcan
            @can('bolivianos.store')
                @if (!$arqueo->boliviano)
                    <ol class="breadcrumb float-sm-right pl-2">
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#bolivianoCreate">Efectivo Bs</button>
                    </ol>
                @endif
            @endcan
            @can('dolars.store')
                @if (!$arqueo->dolar)
                    <ol class="breadcrumb float-sm-right pl-2">
                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#dolarCreate">Efectivo $</button>
                    </ol>
                @endif
            @endcan
        @endif
    </div>
    @include('user.entradas.create')
    @include('user.salidas.create')
    @include('user.bolivianos.create')
    @include('user.dolars.create')
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Entradas</h5>
                    <div class="card-tools">
                        <label for="">{{ $arqueo->entradas->sum('money')}}</label>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-sm">
                            <thead class="thead-dark">
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
                                    <th id="totalEnt">{{ $arqueo->entradas->sum('money')}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Salidas</h5>
                    <div class="card-tools">
                        <label for="">{{ $arqueo->salidas->sum('money') }}</label>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-sm">
                            <thead class="thead-dark">
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
                                    <tr>
                                        <th>#</th>
                                        <th>Total</th>
                                        <th id="totalSal">{{$arqueo->salidas->sum('money')}}</th>
                                    </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <label>SALDO DE CAJA EN CIERRE: {{ $arqueo->entradas->sum('money')-$arqueo->salidas->sum('money') }} Bs.</label>
    </div>
    @if ($arqueo->boliviano)
        @if ($arqueo->dolar)
            <div class="row justify-content-center">
                <label>DETALLES DE CAJA: {{ $arqueo->boliviano->totalbs + ($arqueo->dolar->totald * $arqueo->tc)}} Bs.</label>
            </div>
            <div class="row justify-content-center">
                <label>DIFERENCIA: {{ round(($arqueo->boliviano->totalbs + ($arqueo->dolar->totald * $arqueo->tc) - ($arqueo->entradas->sum('money')-$arqueo->salidas->sum('money'))), 2)}} Bs.</label>
            </div>
        @else
            <div class="row justify-content-center">
                <label>DETALLES DE CAJA: {{ $arqueo->boliviano->totalbs }} Bs.</label>
            </div>
            <div class="row justify-content-center">
                <label>DIFERENCIA: {{ round(($arqueo->boliviano->totalbs) - ($arqueo->entradas->sum('money')-$arqueo->salidas->sum('money')), 2) }} Bs.</label>
            </div>
        @endif
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Efectivo consolidado en caja - Bolivianos</h5>
                    <div class="card-tools">
                        @if ($arqueo->boliviano)
                            <label for="">{{ $arqueo->boliviano->totalbs }}</label>
                        @endif
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($arqueo->boliviano)
                        <table class="table table-sm">
                            <thead class="thead-dark">
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
                                    <th id="totalBs">{{ $arqueo->boliviano->totalbs }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        Pendiente
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Efectivo consolidado en caja - Dolares</h5>
                    <div class="card-tools">
                        @if ($arqueo->dolar)
                            <label for="">{{ $arqueo->dolar->totald * $arqueo->tc }}</label>
                        @endif
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($arqueo->dolar)
                        <table class="table table-sm">
                            <thead class="thead-dark">
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
                    @else
                        Pendiente
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function sumar1 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*200;
        document.getElementById('docientos').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total;
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar2 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*100;
        document.getElementById('cien').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar3 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*50;
        document.getElementById('cincuenta').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar4 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*20;
        document.getElementById('veinte').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar5 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*10;
        document.getElementById('diez').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar6 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*5;
        document.getElementById('cinco').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar7 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*2;
        document.getElementById('dos').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar8 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*1;
        document.getElementById('uno').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar9 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*0.5;
        document.getElementById('cincuentacent').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar10 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*0.2;
        document.getElementById('veintecent').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }
    function sumar11 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*0.1;
        document.getElementById('diezcent').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("docientos").value;
        var num2 = document.getElementById("cien").value;
        var num3 = document.getElementById("cincuenta").value;
        var num4 = document.getElementById("veinte").value;
        var num5 = document.getElementById("diez").value;
        var num6 = document.getElementById("cinco").value;
        var num7 = document.getElementById("dos").value;
        var num8 = document.getElementById("uno").value;
        var num9 = document.getElementById("cincuentacent").value;
        var num10 = document.getElementById("veintecent").value;
        var num11 = document.getElementById("diezcent").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7) + parseFloat(num8) + parseFloat(num9) + parseFloat(num10) + parseFloat(num11);
        // document.getElementById('totalbs').innerHTML = total.toFixed(2);
        document.getElementById('totalbs').value = total.toFixed(2);

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = parseFloat(total)-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFS').innerHTML = totalFS.toFixed(2);
    }

    function sumard1 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*100;
        document.getElementById('ciend').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
    function sumard2 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*50;
        document.getElementById('cincuentad').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
    function sumard3 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*20;
        document.getElementById('viented').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
    function sumard4 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*10;
        document.getElementById('diezd').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
    function sumard5 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*5;
        document.getElementById('cincod').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
    function sumard6 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*2;
        document.getElementById('dosd').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
    function sumard7 (valor) {
        var subtotal = 0;
        valor = parseInt(valor);
        subtotal = valor*1;
        document.getElementById('unod').value = subtotal.toFixed(2);

        var total = 0;
        var num1 = document.getElementById("ciend").value;
        var num2 = document.getElementById("cincuentad").value;
        var num3 = document.getElementById("viented").value;
        var num4 = document.getElementById("diezd").value;
        var num5 = document.getElementById("cincod").value;
        var num6 = document.getElementById("dosd").value;
        var num7 = document.getElementById("unod").value;
        total = parseFloat(num1) + parseFloat(num2) + parseFloat(num3) + parseFloat(num4) +
        parseFloat(num5) + parseFloat(num6) + parseFloat(num7);
        // document.getElementById('totald').innerHTML = total.toFixed(2);
        document.getElementById('totald').value = total.toFixed(2);

        var tc = document.getElementById("tc").innerHTML;
        var totaldbs = 0;
        totaldbs = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totaldbs').innerHTML = totaldbs.toFixed(2);

        var totalBs = document.getElementById("totalBs").innerHTML;

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
</script>
@endsection
