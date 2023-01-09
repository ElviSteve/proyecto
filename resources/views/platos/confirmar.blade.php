@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>¿Desea eliminar registro?  <br> 
            IDPLATO:{{$plato->idplato}} <br>
            NOMBRE: {{$plato->nombreplato}} <br>
            IMAGEN: <img src="/images/{{$plato->imagen}}"  width="20%" alt=""><br>

        </h1>
        <form method="POST" action="{{route('plato.destroy',$plato->idplato)}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"> <i class="fas fa-check-square"></i>
                SI
            </button>
            <a href="{{route('cancelar')}}" class="btn btn-primary" > <i class="fas fa-times-circle"></i>NO</a>
        </form>
    </div>
@endsection