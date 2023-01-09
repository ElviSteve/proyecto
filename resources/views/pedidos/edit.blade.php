@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <h1>Ver Pedido</h1> 
    <div class="alert hidden" role="alert"></div>
    <form method="POST" action="{{route('pedidos.edit',$pedido->idpedido)}}">
    @csrf
    <div style="display: flex; flex-direction: column; justify-items:  center">
        <div class="col-md-2"> 
            <label for="">Nro Pedido</label>
        </div>
        <div class="col-md-8"> 
                <input type="text"class="form-control" placeholder="Seleccionar fecha de atencion" disabled name="fecha" value="PED{{$pedido->idpedido}}">
        </div>
        <br>
        <div class="col-md-1"> 
        <label for="">Fecha</label>
        </div>
        <div class="col-md-8"> 
            <input type="date"class="form-control" placeholder="Seleccionar fecha de atencion" disabled name="fecha" value="{{$pedido->fecha}}">
        </div> 
        <br>
        <div class="form-group" style="padding-left: 10px">
            <label for="exampleFormControlInput1">Numero de Mesa:</label>
            <!-- Button trigger modal -->
            <div style="display: grid; grid-template-columns: 50% 50%; column-gap: 50px;">
              <input type="number" class="form-control " id="#idmesa" name="idmesa" value="{{$pedido->idmesa}}" disabled>
            </div>
        </div>
        <div class="col-md-1">
            <label for="">Cliente :</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="cliente" value="{{$pedido->cliente->nombres}}" disabled>
        </div>
        <br>
    <br>
        <div class="table-responsive">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover text-center"
            style='background-color:#FFFFFF;'>
                <thead class="thead-default" style="background-color:#3c8dbc;color: #fff;">
                    <th width="10" class="text-center">ID PLATO</th>
                    <th width="10" class="text-center">DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th width="10" class="text-center">SUBTOTAL</th>
                    <th class="text-center">ESPECIFICACIONES</th>
                </thead>
                <tbody>
                    @foreach ($detalles as $item)
                    <tr>
                        <td>{{$item->idplato}}</td>
                        <td>{{$item->plato->nombreplato}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->subtotal}}</td>
                        <td>{{$item->especificacion}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-2">
                <label for="">Total : </label>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control text-right" name="total" value="${{$pedido->total}}" readonly="readonly">
            </div>
        </div>
        <br>
        <div class="form-group text-center">
            @if (Auth::user()->name!="Mozo")
                <a  href="{{route('pedidos.pagar',$pedido->idpedido)}}" class="btn btn-primary"><i class="fas fa-save"></i>Pagar pedido</a>
                <a href="javascript:history.back()" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
            @else
                <a href="{{route('pedidos.index')}}" class="btn btn-primary"><i class="fas fa-back"></i>Regresar</a>
            @endif
        </div>
        <br>
@endsection