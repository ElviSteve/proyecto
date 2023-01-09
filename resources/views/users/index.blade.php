@extends('layout.plantilla')

@section('contenido')
<br>
<h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">USUARIOS DEL SISTEMA:</h2>
<div class="card">
  <div class="card-header">

      <h3 class="card-title">LISTA DE USUARIOS</h3>

      <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
          </button>
       </div>
  </div>


  <div class="card-body" style="padding: 0px">

    @if (session('datos'))
    <div id="mensaje">
      <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>    
    @endif 
  </div> 


  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Usuario</th>
      
        
      </tr>
    </thead>
    <tbody>
      @if(count($users)<=0)
      <tr>
        <td colspan="3">NO HAY REGISTROS</td>
      </tr>
      @else
              @foreach ($users as $user)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}}</td>
             
            </tr>
            @endforeach
      @endif
    </tbody>
  </table>


</div>
@endsection

@section('script')
    <script>
      setTimeout(function(){
        document.querySelector('#mensaje').remove();
      }, 2000);
    </script>
@endsection