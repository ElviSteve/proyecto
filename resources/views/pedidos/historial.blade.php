@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">HISTORIAL DE PEDIDOS DEL SISTEMA:</h2>
<div class="card">
  <br>

  <table class="table text-center">
      <thead>
      <tr>
          <th scope="col">ID PEDIDO</th>
          <th scope="col">CLIENTE</th>
          <th scope="col">MODALIDAD</th>
          <th scope="col">FECHA</th>
          <th scope="col">MESA</th>
          <th scope="col">IMPORTE</th>
          <th scope="col">ESTADO</th>
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
                <td>S/{{$item->total}}</td>
                <td>{{$item->estado}}</td>
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