<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/estilos.scss">

</head>
<body class="hold-transition sidebar-mini">
  

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
          <a href="{{route('logout')}}" class="dropdown-item"><strong>Logout</strong></a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(35, 36, 90)">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="/adminlte/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sabor Trujillano</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
      

          <li class="nav-item">

            @can('entradas')
                 <a href="{{route('entradas')}}" class="nav-link">
                   <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Entrada
              </p>
            </a>
            @endcan

           
             
          </li>

          <li class="nav-item">


            @can('principal')
                 <a href="{{route('principal')}}" class="nav-link"> 
                   <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Principal
              </p>
            </a>
            @endcan

          
             
          </li>

          <li class="nav-item">

            @can('postre')
                 <a href="{{route('postre')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Postre
              </p>
            </a>
            @endcan

           
              
          </li>

          <li class="nav-item">

              @can('bebida')
                    <a href="{{route('bebida')}}" class="nav-link">
                      <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Bebidas
              </p>
            </a>  
              @endcan


          
            
          </li>
          <li class="nav-item">
            @can('mesa.index')
                 <a href="{{route('mesa.index')}}" class="nav-link">
                   <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Mesas
              </p>
            </a>
            @endcan
          </li>
          <li class="nav-item">

            @can('cliente.index')
                <a href="{{route('cliente.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Clientes
              </p>
            </a>
            @endcan

          </li>
          
          <li class="nav-item">
           
              <li class="nav-item">

                @can('pedidos.index')
                     <a href="{{route('pedidos.index')}}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos</p>
                </a>
              </li>
                @endcan

               
               
              <li class="nav-item">
              
              @can('pedidos.historial')
                   <a href="{{route('pedidos.historial')}}" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos Historial</p>
                </a>
              @endcan
              
               
                 
              </li>
              <li class="nav-item">


                @can('plato.index')
                       <a href="{{route('plato.index')}}" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Mantenedor Platos
                  </p>
                </a>
                @endcan
    
             
                 
              </li>
              <li class="nav-item">

                @can('users.index')
                      <a href="{{route('users.index')}}" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Usuarios
                  </p>
                </a>
                @endcan
    
            
              </li>
              <li class="nav-item">

                {{-- @can('users.index') --}}
                      <a href="{{route('ordenes.index')}}" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                          Cocina
                        </p>
                      </a>
                {{-- @endcan --}}
    
            
              </li>
          </li>

        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="container">
        @yield('contenido')
    </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 - Grupo 12.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
<script src="/js/anim.js"></script>
<script src="/js/detalle.js"></script>
@yield('script')

</body>
</html>