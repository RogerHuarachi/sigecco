@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">bolivianos</h1>
        @can('bolivianos.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#bolivianoCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.bolivianos.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">bolivianos</li>
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
                                <th>Agencia</th>
                                <th>total</th>
                                @can('bolivianos.update', 'bolivianos.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bolivianos as $boliviano)
                                <tr>
                                    <td>{{ $boliviano->arqueo->date }}</td>
                                    <td>{{ $boliviano->arqueo->agency->name }}</td>
                                    <td>{{ $boliviano->totalbs }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#bolivianoShow{{ $boliviano->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.bolivianos.show')
                                            @can('bolivianos.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#bolivianoDelete{{ $boliviano->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.bolivianos.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $bolivianos->links() !!}
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
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

        var ent = document.getElementById("totalEnt").innerHTML;
        var sal = document.getElementById("totalSal").innerHTML;
        var totalBs = document.getElementById("totalBs").innerHTML;
        var tc = document.getElementById("tc").innerHTML;
        var totalFS = 0;
        totalFS = (parseFloat(totalBs)+(parseFloat(total)*parseFloat(tc)))-(parseFloat(ent)-parseFloat(sal));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
</script>
@endsection
