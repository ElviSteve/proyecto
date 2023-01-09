@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <h1>Registrar Pedido</h1> 
    <div class="alert hidden" role="alert"></div>
    <form method="POST" action="{{route('pedidos.store')}}">
    @csrf
    <div style="display: flex; flex-direction: column; justify-items:  center">
        <div class="col-md-1"> 
        <label for="">Fecha</label>
        </div>
        <div class="col-md-8"> 
            <input type="date"class="form-control" placeholder="Seleccionar fecha de atencion" name="fecha">
        </div> 
        <br>
        <div class="form-group" style="padding-left: 10px">
            <label for="exampleFormControlInput1">Numero de Mesa:</label>
            <!-- Button trigger modal -->
            <div style="display: grid; grid-template-columns: 50% 50%; column-gap: 50px;">
              <input type="number" class="form-control " id="#idmesa" name="idmesa" placeholder="Mesa" required>
              <button type="button" class="btn btn-danger btn sm" data-toggle="modal" data-target="#modalMesas" id="btnmodal" style="width: 200px">
                <i class="fas fa-add"></i>Elegir mesa</a> 
              </button>
            </div>
        <!-- Modal -->
            <div class="modal fade" id="modalMesas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Mesas disponibles:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div style="display: grid; grid-template-columns: 33% 33% 33%; grid-gap: 10px; padding: 15px">
                        @foreach ($mesas as $mesa)
                            <div type="button" style="border: solid 3px rgb(88, 225, 88)" id="{{$mesa->idmesa}}" class="text-center" onclick="elegir(this)">
                            <p style="margin-bottom: 0%; color: azure; background-color: rgb(88, 225, 88)">Mesa {{$mesa->idmesa}}</p>
                            <img src="/images/mesaicon.png" alt="Hola">
                            </div>
                        @endforeach
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <label for="">Cliente :</label>
        </div>
        <div class="col-md-8">
            <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="dni" name="dni" 
            data-live-search="true">
                <option selected value="0">Seleccionar Cliente</option>
                @foreach($clientes as $itemc)
                    <option value="{{$itemc->dni}}">{{$itemc->nombres}} {{$itemc->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-1">
            <label for="">Platos:</label>
        </div>
        <div class="col-md-8">
            <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="platos" name="platos" 
            data-live-search="true">
                <option selected value="0">Seleccione Plato</option>
                @foreach($platos as $itemplato)
                    <option value="{{$itemplato->idplato}}_{{$itemplato->nombreplato}}_{{$itemplato->precio}}">{{ $itemplato->nombreplato}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <div class="row" style="padding-left: 10px">
            <div class="col-md-1">
                <label for="">Precio </label>
                </div>
                <div class="col-md-3">
                <input type="text" class="form-control" name="precio" id="precio" readonly="readonly" disabled>
                </div>
                
                <div class="col-md-1">
                    <label for="">Cantidad :</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="unidad" id="unidad" >
                </div>
            </div>
        <br>
        <div class="col-md-2">
            <label for="">Especificaciones :</label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="especificacion" id="especificacion" >
        </div>
        <br>
        <div class="col-md-3">
            <button type="button" id="btnadddet" class="btn btn-success"><i class="fas fa-plus"></i>
            Agregar Plato</button>
        </div>
    </div> 
    <br>
        <div class="table-responsive">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover text-center"
            style='background-color:#FFFFFF;'>
                <thead class="thead-default" style="background-color:#3c8dbc;color: #fff;">
                    <th width="10" class="text-center">OPCIONES</th>
                    <th width="10" class="text-center">CODIGO</th>
                    <th>DESCRIPCIÓN</th>
                    <th width="10" class="text-center">CANTIDAD</th>
                    <th width="10" class="text-center">P.VENTA</th>
                    <th class="text-center">ESPECIFICACIONES</th>
                    <th width="10">IMPORTE</th>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
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
                <input type="text" class="form-control text-right" name="total" id="total" readonly="readonly">
            </div>
        </div>
        <br>
        
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Registrar Pedido</button>
                <a href="{{route('cancelarped')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>Cancelar</a>
        </div>
        <br>

        <script type="text/javascript">
            function elegir(mesa){
              var num = mesa.getAttribute('id');
              document.getElementById('#idmesa').value=num;
              $('#modalMesas').modal('hide');
            }
        </script>
@endsection