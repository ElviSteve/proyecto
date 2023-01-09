@extends('layout.plantilla')

@section('contenido')
<link rel="stylesheet" href="estilos.less">
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Listado de Entradas</h2>

  


  <div class="card-body" style="padding: 0px">
   
      <div class="row">

        @foreach ($platoEntrada as $itemplato)
        <div class="col-4">
          <div class="card" style="width: 18rem;">
          <img src="/images/{{$itemplato->imagen}}"  width="100%" alt="">
            <div class="card-body">
              <h5 class="card-title"> <b>{{$itemplato->nombreplato}}</b> </h5>
              <p class="card-text">{{$itemplato->descripcion}}</p>
              <p class="card-text">S/.{{$itemplato->precio}}</p>
            </div>
          </div>
        </div>
        @endforeach

     
      </div>





    {{$platoEntrada->links()}}
  </div> 

    



@endsection

@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection