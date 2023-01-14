@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">DETALLE DE ORDEN N°{{$orden}}<h2>
<div class="card">
  <div class="card-header">

      <h3 class="card-title">LISTA DE PRODUCTOS</h3>


  </div>


  <div class="card-body" style="padding: 0px">

    <nav class="navbar navbar-light float-left" style="width: 100%">
      <a href="{{route('ordendetalle.create',$orden)}}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Nuevo Producto
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
      <tr style="font-size: 18px">
        <th scope="col">ID DETALLE</th>
        <th scope="col">PRODUCTO</th>
        <th scope="col">UNIDAD</th>
        <th scope="col">CANTIDAD</th>
      </tr>
    </thead>
    <tbody>
      @if(count($dorden)<=0)
      <tr style="font-size: 18px">
        <td colspan="3">NO HAY PRODUCTOS</td>
      </tr>
      @else
              @foreach ($dorden as $detalles)
              <tr style="font-size: 18px">
              <th scope="row">{{$detalles->iddetalle}}</th>
              <td>{{$detalles->producto}}</td>
              <td>{{$detalles->unidad}}</td>
              <td>{{$detalles->cantidad}}</td>
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