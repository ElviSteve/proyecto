@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">ORDENES DE ABASTECIMIENTO:</h2>
<div class="card">
  <div class="card-header">

      <h3 class="card-title">LISTA DE ORDENES</h3>


  </div>


  <div class="card-body" style="padding: 0px">

    <nav class="navbar navbar-light float-left" style="width: 100%">
      <a href="{{route('ordenes.create')}}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Nueva Orden
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


  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID ORDEN</th>
        <th scope="col">FECHA</th>
        <th scope="col">ENCARGADO</th>
        <th scope="col">REGISTRAR DETALLE</th>
        {{-- <th scope="col">IMPRIMIR</th> --}}
      </tr>
    </thead>
    <tbody>
      @if(count($orden)<=0)
      <tr>
        <td colspan="3">NO HAY ORDENES</td>
      </tr>
      @else
              @foreach ($orden as $ordenes)
            <tr>
              <th scope="row">{{$ordenes->idorden}}</th>
              <td>{{$ordenes->fecha}}</td>
              <td>{{$ordenes->encargado}}</td>
              <td>
                <a href="{{route('ordendetalle.index',$ordenes->idorden)}}" class="btn btn-info btn sm"><i class="fas fa-edit"></i>
                  Agregar Detalle
                </a> 
              </td>
              <td>
                {{-- <a href="" class="btn btn-danger btn sm"><i class="fas fa-pdf"></i>
                  Imprimir PDF
                </a>  --}}
              </td>
            </tr>
            @endforeach
      @endif
    </tbody>
  </table>


</div>
@endsection

@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection