@extends('layout.plantilla')

@section('contenido')
<h1>ASIGNAR ROL</h1>

<div class="container">
    <form method="POST" action="{{route('users.update',$user)}}">
        @method('put')
        @csrf
        
        <div class="form-group">
            <label class="control-label">USUARIO:</label>
                <input type="text" class="form-control" 
                    id="id" name="id" value="{{$user->name}}" />
                
        </div>
        <div class="form-group">
            <h2>Listado de Roles</h2>
            @foreach ($roles as $role)
            <div class="form-check">
                <input   class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}" id="flexCheckDefault">
                <label  class="form-check-label" for="flexCheckDefault">
                  {{$role->name}}
                </label>
              </div>
            @endforeach
        </div>
            <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i>
                Grabar 
            </button>
           
        
    </form>
</div>
@endsection