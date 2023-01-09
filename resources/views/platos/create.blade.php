@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Registro Nuevo</h1>
        <form method="POST" action="{{route('plato.store')}}">
            @csrf
            
            <div class="form-group">
                <label class="control-label">Nombre Plato:</label> 
                    <input type="text" class="form-control @error('nombreplato') is-invalid @enderror" 
                        placeholder="Ingrese nombre plato" id="nombreplato" name="nombreplato"/>
                    @error('nombreplato')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label class="control-label">CATEGORIA:</label>
               <select class="form-control @error('idcategoria') is-invalid  @enderror" id="idcategoria" name="idcategoria" >
                @foreach ($categoria as $itemcategoria)
                    <option value="{{$itemcategoria['idcategoria']}}"> {{$itemcategoria['categoria']}}</option>
                @endforeach
               </select>
               @error('idcategoria')
                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">PRECIO:</label>
                    <input min="0" type="number" class="form-control @error('precio') is-invalid @enderror" 
                        placeholder="Ingrese precio" id="precio" name="precio"/>
                    @error('precio')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label class="control-label">descripcion:</label> 
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
                        placeholder="Ingrese descripcion" id="descripcion" name="descripcion"/>
                    @error('descripcion')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>


            <div class="form-group">
                <label class="control-label">Imagen Referencial:</label>
                
                    <input  id="imagen" name="imagen" type="file" class="hidden"/>
                    @error('stock')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i>
                    Grabar 
                </button>
                <a href="{{route('cancelar')}}" class="btn btn-danger" > <i class="fas fa-ban"></i>Cancelar</a>
            
        </form>
    </div>
@endsection