
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="{{ asset('restaurante/public/css/login/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('restaurante/public/css/login/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('restaurante/public/css/login/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('restaurante/public/css/login/login.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>

    <link rel="icon" href="{!! asset ('restaurante/public/archivos/favicon.ico') !!}" type="image/x-icon">

    <title>Inicio de sesión</title>
  </head>
  <body>
  

    <div class="d-md-flex half">
      <div class="bg" style="background-image: url('/restaurante/public/archivos/login.jpg');"></div>
      <div class="contents">

        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-12">
              <div class="form-block mx-auto">
                <div class="text-center mb-5">
                <h3>Iniciar sesión</h3>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                </div>
                <form action =  "{{route('validar')}}" method= "POST">
                {{ csrf_field() }}
                  <div class="form-group first">
                    <label for="username">Usuario</label>
                    <input type="text" class="form-control" placeholder="Ingresa tu usuario" name = 'nombre_usuario'>
                    @if($errors->first('nombre_usuario'))
                        <p class="text-warning">{{ $errors->first('nombre_usuario') }}</p>
                    @endif
                  </div>
                  <div class="form-group last mb-3">
                    <label for="password">Contraseña</label>
                    <input type="text" class="form-control" placeholder="Ingresa tu contraseña"name = 'contrasena'>
                    @if($errors->first('contrasena'))
                        <p class="text-warning">{{ $errors->first('contrasena') }}</p>
                    @endif
                  </div>
                  
                  
                  <input type="submit" value="Ingresar" class="btn btn-block btn-primary">
                  
                </form>
                <div class="d-sm-flex mb-5 align-items-center">
                @if (Session::has('mensaje'))    
                  <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <h6 class="alert-heading">AVISO</h6>
                      <p class="mb-0">{{ Session::get('mensaje') }}</p>
                  </div>
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    
    

</body>
</html>