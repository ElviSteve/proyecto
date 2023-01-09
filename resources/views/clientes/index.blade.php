@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">CLIENTES DEL SISTEMA:</h2>
<div class="card">
  <div class="card-header">

      <h3 class="card-title">LISTA DE CLIENTES</h3>

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
      <a href="{{route('cliente.create')}}" class="btn btn-primary">
        <i class="fa fa-user"></i> Nuevo Cliente
      </a>
      
      <form class="form-inline my-2" method="GET">
        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Busqueda por Nombres" aria-label="Search" value="">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
          <th scope="col">DNI</th>
          <th scope="col">NOMBRES</th>
          <th scope="col">TELEFONO</th>
          <th scope="col">TIPO</th>
          <th scope="col">DIRECCION</th>
          <th scope="col">OPCIONES</th>
      </tr>
      </thead>

      <tbody>

        @if(count($cliente)<=0)
          <tr>
            <td colspan="3">No hay registros</td>
          </tr>
        @else
          @foreach ($cliente as $item)
            <tr>
                <td>{{$item->dni}}</td>
                <td>{{$item->nombres}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->tipo}}</td>
                <td>{{$item->direccion}}</td>
                <td>
                    <a href="{{route('cliente.edit',$item->dni)}}" class="btn btn-info btn sm"><i class="fas fa-edit"></i>Editar</a> 
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger btn sm" data-toggle="modal" data-target="#deleteUser{{$item->dni}}" id="btnmodal">
                          <i class="fas fa-trash"></i>Eliminar</a> 
                      </button> 
                    <!-- Modal -->
                    <form method="POST" action="{{route('cliente.destroy',$item->dni)}}">
                      @method('delete')
                      @csrf
                      <div class="modal fade" id="deleteUser{{$item->dni}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro de eliminar al siguiente cliente?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                DNI: {{$item->dni}}
                                <br>
                                Nombre: {{$item->nombres}}
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
  {{$cliente->links()}}

</div>
@endsection


@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection