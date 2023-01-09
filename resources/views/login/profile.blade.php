@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">ACTUALIZAR MI PERFIL:</h2>
<form action="{{route('users.update',$user->id)}}" method="POST">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombres</label>
    <input type="text" class="form-control  @error('name') is-invalid  @enderror" id="name" name="name" value="{{$user->name}}" required>
    @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">User</label>
    <input type="text" class="form-control  @error('user') is-invalid  @enderror" id="user" name="user" value="{{$user->user}}" required>
    @error('user')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control  @error('password') is-invalid  @enderror" id="password" name="password" placeholder="Ingrese contraseña" required>
    @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Rol</label>
    <select class="form-control" id="rol" name="rol" value="">
      <option value="Mozo" {{$user->rol == "Mozo" ? 'selected':'' }}>Mozo</option>
      <option value="Cajero" {{$user->rol == "Cajero" ? 'selected':'' }}>Cajero</option>
      <option value="Admin" {{$user->rol == "Admin" ? 'selected':'' }}>Administrador</option>
    </select>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save"></i>Actualizar</button>
    <a href="{{route('cancelaru')}}" class="btn btn-danger">
        <i class="fas fa-ban"></i>Cancelar</a>
  </div>
</form>
@endsection