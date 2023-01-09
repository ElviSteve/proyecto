@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">MESAS DEL RESTAURANT:</h2>
<div class="card">
  <div class="card-header">
      <h3 class="card-title">MESAS</h3>
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
      <a href="{{route('mesa.create')}}" class="btn btn-primary">
        <i class="fa fa-user"></i> CREAR NUEVA MESA
      </a>
      
      <form class="form-inline my-2" method="GET">
        <select name="buscarpor" id="buscarpor">
            <option value="">Todas</option>
            <option value="1">Disponibles</option>
            <option value="0">Ocupadas</option>
        </select> <p>&nbsp;   </p>
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
          <th scope="col">NUMERO DE MESA</th>
          <th scope="col">DISPONIBILIDAD</th>
      </tr>
      </thead>

      <tbody>

        @if(count($mesa)<=0)
          <tr>
            <td colspan="2">No hay registros</td>
          </tr>
        @else
          @foreach ($mesa as $item)
            <tr>
                <td>{{$item->idmesa}}</td>
                <td>@if($item->estado=='1')
                    Disponible
                    @else
                    Ocupado
                    @endif
            </td>
                <td>
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger btn sm" data-toggle="modal" data-target="#deleteUser{{$item->idmesa}}" id="btnmodal">
                          <i class="fas fa-trash"></i>Eliminar</a> 
                      </button> 
                    <!-- Modal -->
                    <form method="POST" action="{{route('mesa.destroy',$item->idmesa)}}">
                      @method('delete')
                      @csrf
                      <div class="modal fade" id="deleteUser{{$item->idmesa}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro de eliminar la siguiente mesa?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              {{$item->idmesa}}
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
  {{$mesa->links()}}

</div>
@endsection

@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection