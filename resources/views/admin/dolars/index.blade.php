@extends('layouts.app')
@section('title')
    <div class="row">
        <h1 class="m-0">dolars</h1>
        @can('dolars.store')
            <ol class="breadcrumb float-sm-right pl-1">
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#dolarCreate"><i class="fas fa-plus-circle"></i></button>
            </ol>
        @endcan
    </div>
    @include('admin.dolars.create')
@endsection
@section('browser')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">inicio</a></li>
    <li class="breadcrumb-item">dolars</li>
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
                                @can('dolars.update', 'dolars.destroy')
                                <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dolars as $dolar)
                                <tr>
                                    <td>{{ $dolar->arqueo->date }}</td>
                                    <td>{{ $dolar->arqueo->agency->name }}</td>
                                    <td>{{ $dolar->totald }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#dolarShow{{ $dolar->id }}"><i class="fas fa-eye"></i></button>
                                            @include('admin.dolars.show')
                                            @can('dolars.destroy')
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#dolarDelete{{ $dolar->id }}"><i class="fas fa-trash-alt"></i></button>
                                                @include('admin.dolars.delete')
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                    {!! $dolars->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
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
        var totalFS = 0;
        totalFS = (parseFloat(total)*parseFloat(tc));
        document.getElementById('totalFSd').innerHTML = totalFS.toFixed(2);
    }
</script>
@endsection
