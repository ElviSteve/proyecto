@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">PEDIDOS DEL SISTEMA:</h2>
<div class="card">
  <div class="card-header">

      <h3 class="card-title">PEDIDOS REGISTRADOS</h3>

      <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
          </button>
       </div>
  </div>


  <div class="card-body" style="padding: 0px">
    <nav class="navbar navbar-light float-left" style="width: 100%">
      <a href="{{route('pedidos.create')}}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Nuevo Pedido
      </a>
    </nav>

    @if (session('datos'))
    <div id="mensaje">
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>    
    @endif 
  </div> 


  <table class="table text-center">
      <thead>
      <tr>
          <th scope="col">ID PEDIDO</th>
          <th scope="col">CLIENTE</th>
          <th scope="col">MODALIDAD</th>
          <th scope="col">FECHA</th>
          <th scope="col">MESA</th>
          <th scope="col">ESTADO</th>
          <th scope="col">IMPORTE</th>
          <th scope="col">OPCIONES</th>
      </tr>
      </thead>

      <tbody>

        @if(count($pedidos)<=0)
          <tr>
            <td colspan="3">No hay registros</td>
          </tr>
        @else
          @foreach ($pedidos as $item)
            <tr>
                <td>{{$item->idpedido}}</td>
                <td>{{$item->cliente->nombres}}</td>
                <td>{{$item->cliente->tipo}}</td>
                <td>{{$item->fecha}}</td>
                <td>Mesa N°{{$item->idmesa}}</td>
                <td>{{$item->estado}}</td>
                <td>S/{{$item->total}}</td>
                <td>
                    <a href="{{route('pedidos.edit',$item->idpedido)}}" class="btn btn-info btn sm"><i class="fas fa-edit"></i>
                        @if (Auth::user()->name=="Mozo")
                            Ver Detalle
                        @else
                            Cancelar Pedido
                        @endif
                    </a> 
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger btn sm" data-toggle="modal" data-target="#deleteUser{{$item->idpedido}}" id="btnmodal">
                          <i class="fas fa-trash"></i>Eliminar</a> 
                      </button> 
                    <!-- Modal -->
                    <form method="POST" action="{{route('pedidos.destroy',$item->idpedido)}}">
                      @method('delete')
                      @csrf
                      <div class="modal fade" id="deleteUser{{$item->idpedido}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro de eliminar al siguiente pedido?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Numero: {{$item->idpedido}}
                              <br>
                              Cliente: {{$item->cliente->nombres}}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-danger btn sm">Confirmar</button>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </form>            
                </td>
            </tr>
          @endforeach
        @endif
      </tbody>
  </table>
  {{$pedidos->links()}}

</div>
<br>
@endsection

@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection