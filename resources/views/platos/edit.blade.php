@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Editar Plato</h1>
        <form method="POST" action="{{route('plato.update',$plato->idplato)}}">
            @method('put')
            @csrf
            
            <div class="form-group">
                <label class="control-label">ID PLATO:</label>
                    <input type="text" id="idplato" name="idplato" value="{{$plato->idplato}}" disabled/>
            </div>

            <div class="form-group">
                <label class="control-label">nombre plato:</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
                         id="nombreplato" name="nombreplato" value="{{$plato->nombreplato}}"/>
                    @error('descripcion')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>


            <div class="form-group">
                <label class="control-label">Imagen</label>
                <div>
                    <img src="/images/{{$plato->imagen}}"  width="20%" alt="">
                </div>
                <span id='upload-file-name'></span>
                <input  id="imagen" name="imagen" type="file" class="hidden"/>
            </div>


            <div class="form-group">
                <label class="control-label">Descripcion:</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" 
                         id="descripcion" name="descripcion" value="{{$plato->descripcion}}"/>
                    @error('descripcion')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label class="control-label">PRECIO:</label>
                    <input min="0" type="number" class="form-control @error('precio') is-invalid @enderror" 
                        placeholder="Ingrese precio" id="precio" name="precio" value="{{$plato->precio}}"/>
                    @error('precio')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>


            <div class="form-group">
                <label class="control-label">CATEGORIA:</label>
               <select class="form-control" id="idcategoria" name="idcategoria">
                @foreach ($categoria as $itemcategoria)
                    <option value="{{$itemcategoria['idcategoria']}}"  {{$itemcategoria->idcategoria == $plato->idcategoria ? 'selected' :''}}> {{$itemcategoria['categoria']}}</option>
                @endforeach
               </select>
                  
                   
            </div>


                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i>
                    Grabar 
                </button>
                <a href="{{route('cancelar')}}" class="btn btn-danger" > <i class="fas fa-ban"></i>Cancelar</a>
            
        </form>
    </div>
@endsection