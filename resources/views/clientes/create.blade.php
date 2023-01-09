@extends('layout.plantilla')

@section('contenido')

<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">REGISTRAR NUEVO CLIENTE:</h2>
<form action="{{route('cliente.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">DNI:</label>
    <input type="text" class="form-control  @error('dni') is-invalid  @enderror" id="#dni" name="dni" placeholder="Ingresar dni" value="{{old('dni')}}" required>
    @error('dni')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombres</label>
    <input type="text" class="form-control  @error('nombres') is-invalid  @enderror" id="name" name="nombres" placeholder="Ingresar nombres" required>
    @error('nombres')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror

  <br>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Telefono:</label>
    <input type="number" class="form-control  @error('telefono') is-invalid  @enderror" id="telefono" name="telefono" placeholder="Ingresar telefono" required>
    @error('telefono')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo:</label>
    <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid  @enderror" required onchange="activar();">
        <option value="DELIVERY">DELIVERY</option>    
        <option value="PRESENCIAL">PRESENCIAL</option>
            
    </select>
    @error('tipo')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" id="et"> Direccion:</label>
    <input type="text" class="form-control  @error('direccion') is-invalid  @enderror" id="direccion" name="direccion" placeholder="Ingresar direccion">
    @error('direccion')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div> 
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>Grabar</button>
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
@section('script')
@endsection