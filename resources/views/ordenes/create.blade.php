@extends('layout.plantilla')

@section('contenido')

<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">REGISTRAR NUEVA ORDEN DE ABASTECIMIENTO:</h2>
<form action="{{route('ordenes.grabar')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Fecha</label>
    <input type="date" class="form-control  @error('fecha') is-invalid  @enderror" id="fecha" name="fecha" placeholder="Ingresar fecha" required>
    @error('fecha')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Encargado</label>
    <input type="text" class="form-control  @error('encargado') is-invalid  @enderror" id="encargado" name="encargado" placeholder="Ingresar nombre del encargado" required>
    @error('encargado')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>Crear orden</button>
        {{-- <a href="{{route('cancelaru')}}" class="btn btn-danger"> --}}
        {{-- <i class="fas fa-ban"></i>Cancelar</a> --}}
        <a href="{{route('cancelaro')}}" class="btn btn-danger" > <i class="fas fa-ban"></i>Cancelar</a>
  </div>
</form>

@endsection