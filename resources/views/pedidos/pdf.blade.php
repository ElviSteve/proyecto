<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      img.{
        width: 35%;
      }
    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body >
  <div align="center">
     <img src="https://10619-2.s.cdn12.com/rests/small/w550/h367/335_508052405.jpg" alt=""> 
  </div> 
    
    <h2 style="text-align: center">BOLETA DE VENTA</h2> <br>
    <table class="table">
        <tr>
            <td style="text-align: left">Sabor Trujillano S.A.C</td>
            <td style="text-align: right">{{$pedido->fecha}}</td>
        </tr>
    </table>

    <table class="table">
        <tr>
            <td><b>Cliente: </b> {{$pedido->cliente->nombres}}</td>
            <td><b>Numero Pedido: </b> PED{{$pedido->idpedido}} </td>
            <td><b>Numero de Mesa: </b>{{$pedido->idmesa}} </td>
        </tr>
    </table>

    
    <br>
    <table class="table" style="text-align: center" border="2">
        <thead>
          <tr>
            <th scope="col" >DESCRIPCIÓN</th>
            <th scope="col">ESPECIFICACIONES</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">SUBTOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($detalles as $item)
                    <tr>
                        <td>{{$item->plato->nombreplato}}</td>
                        <td>{{$item->especificacion}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>S/. {{$item->subtotal}}</td>
                    </tr>
                    @endforeach
          </tr>
        </tbody>
      </table>
      <br>
      <table class="table" >
        <thead>
          <tr>
            
            <th scope="col" style="text-align: right">TOTAL A PAGAR</th>
            <th scope="col" style="text-align: center">S/. {{$pedido->total}} </th>
          </tr>
          
        </thead>
      </table>


</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>