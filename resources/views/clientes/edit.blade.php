@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">EDITAR CLIENTE:</h2>
<form action="{{route('cliente.update',$cliente->dni)}}" method="POST">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleFormControlInput1">DNI:</label>
    <input type="text" class="form-control" id="dni" name="dni" value="{{$cliente->dni}}" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombres</label>
    <input type="text" class="form-control  @error('nombres') is-invalid  @enderror" id="name" name="nombres" value="{{$cliente->nombres}}" required>
    @error('nombres')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono:</label>
    <input type="number" class="form-control  @error('telefono') is-invalid  @enderror" id="telefono" name="telefono" value="{{$cliente->telefono}}" required>
    @error('telefono')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo:</label>
    <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid  @enderror" required onchange="activar();">
            <option value="PRESENCIAL" {{$cliente->tipo == "PRESENCIAL" ? 'selected':'' }}>PRESENCIAL</option>
            <option value="DELIVERY" {{$cliente->tipo == "DELIVERY" ? 'selected':'' }}>DELIVERY</option>
    </select>
    @error('tipo')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" id="et">Direccion:</label>
    <input type="text" class="form-control  @error('direccion') is-invalid  @enderror" id="direccion" name="direccion" value="{{$cliente->direccion}}">
    @error('direccion')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div> 
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>Actualizar</button>
    <a href="{{route('cancelarc')}}" class="btn btn-danger">
        <i class="fas fa-ban"></i>Cancelar</a>
  </div>
</form>

<script type="text/javascript">
  $ ('#direccion').hide();
  function activar(){ 
    tipo = $('#tipo option:selected').text();
    if(tipo=='DELIVERY'){
      $ ('#et').show();
      $ ('#direccion').show();
    }else{
      $ ('#et').hide();
      $ ('#direccion').hide();
    }
  }
</script>
@endsection