@extends('layout.plantilla')

@section('contenido')

<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">REGISTRAR NUEVO USUARIO:</h2>
<form action="{{route('users.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombres</label>
    <input type="text" class="form-control  @error('name') is-invalid  @enderror" id="name" name="name" placeholder="Ingresar nombres" required>
    @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">User</label>
    <input type="text" class="form-control  @error('user') is-invalid  @enderror" id="user" name="user" placeholder="Ingresar User" required>
    @error('user')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control  @error('password') is-invalid  @enderror" id="password" name="password" placeholder="Ingresar Contraseña" required>
    @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Rol</label>
    <select class="form-control" id="rol" name="rol">
      <option value="Mozo">Mozo</option>
      <option value="Cajero">Cajero</option>
      <option value="Admin">Administrador</option>
    </select>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>Grabar</button>
        {{-- <a href="{{route('cancelaru')}}" class="btn btn-danger"> --}}
        {{-- <i class="fas fa-ban"></i>Cancelar</a> --}}
        <a href="{{route('cancelaru')}}" class="btn btn-danger" > <i class="fas fa-ban"></i>Cancelar</a>
  </div>
</form>

@endsection