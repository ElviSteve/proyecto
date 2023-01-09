@extends('layout.plantilla')

@section('contenido')
<link rel="stylesheet" href="estilos.less">
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Listado de Platos</h2>

  <div class="card-header">

      <h3 class="card-title">Platos</h3>

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
      <a href="{{route("plato.create")}}" class="btn btn-primary">
        <i class="fa fa-user"></i> Nuevo Plato
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

      <div class="row">

        @foreach ($plato as $itemplato)
        <div class="col-4">
          <div class="card" style="width: 18rem;">
          <img src="/images/{{$itemplato->imagen}}"  width="100%" alt="">
            <div class="card-body">
              <h5 class="card-title"> <b>{{$itemplato->nombreplato}}</b> </h5>
              <p class="card-text">{{$itemplato->descripcion}}</p>
              <p class="card-text">S/.{{$itemplato->precio}}</p>
              <a href="{{route('plato.edit',$itemplato->idplato)}}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> Editar</a> 

                   <!-- Button trigger modal -->
                   <button type="button" class="btn btn-danger btn sm" data-toggle="modal" data-target="#deleteUser{{$itemplato->idplato}}" id="btnmodal">
                    <i class="fas fa-trash"></i>Eliminar</a> 
                </button> 
              <!-- Modal -->
              <form method="POST" action="{{route('plato.destroy',$itemplato->idplato)}}">
                @method('delete')
                @csrf
                <div class="modal fade" id="deleteUser{{$itemplato->idplato}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro de eliminar el siguiente plato?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <b>{{$itemplato->nombreplato}}</b>
                       <h1> <img src="/images/{{$itemplato->imagen}}"  width="100%" alt=""></h1>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger btn sm">Confirmar</button>
                      </div>
                    </div>
                  </div>
                </div> 
              </form>  

            </div>
          </div>
        </div>
        @endforeach

     
      </div>





    {{$plato->links()}}
  </div> 

    



@endsection

@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection