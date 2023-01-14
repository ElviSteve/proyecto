@extends('layout.plantilla')

@section('contenido')
 
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">REGISTRAR NUEVA ORDEN DE ABASTECIMIENTO:</h2>
<form action="{{route('ordendetalle.grabar',$orden)}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Producto</label>
    <input type="text" class="form-control  @error('producto') is-invalid  @enderror" id="producto" name="producto" placeholder="Ingresar producto" required>
    @error('producto')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Unidad</label>
    <input type="text" class="form-control  @error('unidad') is-invalid  @enderror" id="unidad" name="unidad" placeholder="Ingresar unidad del producto" required>
    @error('unidad')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="text" class="form-control  @error('cantidad') is-invalid  @enderror" id="cantidad" name="cantidad" placeholder="Ingresar cantidad requerida" required>
    @error('cantidad')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>Agregar producto</button>
        {{-- <a href="{{route('cancelaru')}}" class="btn btn-danger"> --}}
        {{-- <i class="fas fa-ban"></i>Cancelar</a> --}}
        {{-- <a href="{{route('cancelardo',$orden)}}" class="btn btn-danger" > <i class="fas fa-ban"></i>Cancelar</a> --}}
  </div>
</form>

@endsection