<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sabor Trujillano</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="min-height: 100vh; background-size: cover; background-image: url(images/login.jpg);">
        <div class="container-fluid">
          <div class="row  justify-content-center align-items-center d-flex-row h-100">
            <div class="col-12 col-md-4 col-lg-3   h-50 ">
              <div class="card shadow">
                <div class="card-body" style="padding: 10px 30px 20px 30px; display: flex ; flex-direction: column">
                  <div style="margin: auto">
                    <a href="">
                        <img src="images/logologin.png" style="width:250px">
                    </a>
                  </div>

                  <form method="POST" action="{{route('identificacion')}}" class="text-center">
                    @csrf
                    <h4 class="form-title">CARTA</h4>
                    <div class="form-group" style="display: none" >
                        <label class="control-label">USUARIO:</label>
                        <div class="input-icon" >
                            <i class="fas fa-user"></i>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Ingrese usuario" id="name" name="name" value="{{'Comensal'}}" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                       
                        <div class="input-icon" style="display: none">
                            <i class="fas fa-lock"></i>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Ingrese contraseña" id="password" name="password" value="{{'password'}}" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
        
                    <hr />
                  
                    <div class="form-actions">
                        <button class="btn btn-success btn-block">
                           Carta 
                        </button>
                    </div>
                    <hr />
                </form>


                  <form method="POST" action="{{route('identificacion')}}" class="text-center">
                    @csrf
                    <h4 class="form-title">Inicio de Sesión</h4>
                    <div class="form-group">
                        <label class="control-label">USUARIO:</label>
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Ingrese usuario" id="name" name="name" value="{{old('name')}}" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">CONTRASEÑA:</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Ingrese contraseña" id="password" name="password" value="{{old('password')}}" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
        
                    <hr />
                    <div class="form-actions">
                        <button class="btn btn-success btn-block">
                            Ingresar </button>
                    </div>
                   
                    <hr />
                </form>


                </div>
              </div>
            </div>
          </div>
        </div>
     </section>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>
