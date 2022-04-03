
@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Carpetas</h1>
        </div>
      </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        {{-- <table  id="example1" class="table table-bordered table-striped"> --}}
                        <table  id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Cod Arq</th>
                                    <th>Fecha</th>

                                    <th>Departamento</th>

                                    <th>Agencia</th>
                                    <th>Cod Ag.</th>

                                    <th>Responsable</th>

                                    <th>Tipo</th>

                                    <th>Categoria</th>
                                    <th>Articulo</th>
                                    <th>Monto</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arqueos as $arqueo)
                                    @foreach ($arqueo->entradas as $entrada)
                                        <tr>
                                            <td>{{ $arqueo->id }}</td>
                                            <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                            <td>{{ $arqueo->agency->city->name }}</td>

                                            <td>{{ $arqueo->agency->name }}</td>
                                            <td>{{ $arqueo->agency->codigo }}</td>

                                            <td>{{ $arqueo->user->name }}</td>

                                            <td>Ingreso</td>

                                            <td>{{ $entrada->category }}</td>
                                            <td>{{ $entrada->item }}</td>
                                            <td>{{ $entrada->money }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($arqueo->salidas as $salida)
                                        <tr>
                                            <td>{{ $arqueo->id }}</td>
                                            <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                            <td>{{ $arqueo->agency->city->name }}</td>

                                            <td>{{ $arqueo->agency->name }}</td>
                                            <td>{{ $arqueo->agency->codigo }}</td>

                                            <td>{{ $arqueo->user->name }}</td>

                                            <td>Egreso</td>

                                            <td>{{ $salida->category }}</td>
                                            <td>{{ $salida->item }}</td>
                                            <td>{{ $salida->money }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>200</td>
                                            <td>{{ $arqueo->boliviano->docientos }}</td>
                                            <td>{{ 200 * $arqueo->boliviano->docientos }}</td>
                                        @else
                                            <td>200</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>100</td>
                                            <td>{{ $arqueo->boliviano->cien }}</td>
                                            <td>{{ 100 * $arqueo->boliviano->cien }}</td>
                                        @else
                                            <td>100</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>50</td>
                                            <td>{{ $arqueo->boliviano->cincuenta }}</td>
                                            <td>{{ 50 * $arqueo->boliviano->cincuenta }}</td>
                                        @else
                                            <td>50</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>20</td>
                                            <td>{{ $arqueo->boliviano->veinte }}</td>
                                            <td>{{ 20 * $arqueo->boliviano->veinte }}</td>
                                        @else
                                            <td>20</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>10</td>
                                            <td>{{ $arqueo->boliviano->diez }}</td>
                                            <td>{{ 10 * $arqueo->boliviano->diez }}</td>
                                        @else
                                            <td>10</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>5</td>
                                            <td>{{ $arqueo->boliviano->cinco }}</td>
                                            <td>{{ 5 * $arqueo->boliviano->cinco }}</td>
                                        @else
                                            <td>5</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>2</td>
                                            <td>{{ $arqueo->boliviano->dos }}</td>
                                            <td>{{ 2 * $arqueo->boliviano->dos }}</td>
                                        @else
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>1</td>
                                            <td>{{ $arqueo->boliviano->uno }}</td>
                                            <td>{{ 1 * $arqueo->boliviano->uno }}</td>
                                        @else
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>0.5</td>
                                            <td>{{ $arqueo->boliviano->cincuentacent }}</td>
                                            <td>{{ 0.5 * $arqueo->boliviano->cincuentacent }}</td>
                                        @else
                                            <td>0.5</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>0.2</td>
                                            <td>{{ $arqueo->boliviano->veintecent }}</td>
                                            <td>{{ 0.2 * $arqueo->boliviano->veintecent }}</td>
                                        @else
                                            <td>0.2</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo Bs</td>

                                        @if ($arqueo->boliviano)
                                            <td>0.1</td>
                                            <td>{{ $arqueo->boliviano->diezcent }}</td>
                                            <td>{{ 0.1 * $arqueo->boliviano->diezcent }}</td>
                                        @else
                                            <td>0.1</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>

                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>100</td>
                                            <td>{{ $arqueo->dolar->ciend }}</td>
                                            <td>{{ 100 * $arqueo->dolar->ciend * $arqueo->tc }}</td>
                                        @else
                                            <td>100</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>50</td>
                                            <td>{{ $arqueo->dolar->cincuentad }}</td>
                                            <td>{{ 50 * $arqueo->dolar->cincuentad * $arqueo->tc }}</td>
                                        @else
                                            <td>50</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>20</td>
                                            <td>{{ $arqueo->dolar->viented }}</td>
                                            <td>{{ 20 * $arqueo->dolar->viented * $arqueo->tc }}</td>
                                        @else
                                            <td>20</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>10</td>
                                            <td>{{ $arqueo->dolar->diezd }}</td>
                                            <td>{{ 10 * $arqueo->dolar->diezd * $arqueo->tc }}</td>
                                        @else
                                            <td>10</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>5</td>
                                            <td>{{ $arqueo->dolar->cincod }}</td>
                                            <td>{{ 5 * $arqueo->dolar->cincod * $arqueo->tc }}</td>
                                        @else
                                            <td>5</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>2</td>
                                            <td>{{ $arqueo->dolar->dosd }}</td>
                                            <td>{{ 2 * $arqueo->dolar->dosd * $arqueo->tc }}</td>
                                        @else
                                            <td>2</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $arqueo->id }}</td>
                                        <td>{{  strval(date_format(new DateTime($arqueo->created_at), 'Y-m-d')) }}</td>

                                        <td>{{ $arqueo->agency->city->name }}</td>

                                        <td>{{ $arqueo->agency->name }}</td>
                                        <td>{{ $arqueo->agency->codigo }}</td>

                                        <td>{{ $arqueo->user->name }}</td>

                                        <td>Efectivo $</td>

                                        @if ($arqueo->dolar)
                                            <td>1</td>
                                            <td>{{ $arqueo->dolar->unod }}</td>
                                            <td>{{ 1 * $arqueo->dolar->unod * $arqueo->tc  }}</td>
                                        @else
                                            <td>1</td>
                                            <td>0</td>
                                            <td>0</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
