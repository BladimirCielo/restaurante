<html>
<head>
    <link href="{!! asset('/restaurante/public/css/bootstrap.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/restaurante/public/css/bootstrap.min.css') !!}" rel="stylesheet" />
    <link rel="icon" href="{!! asset ('restaurante/public/archivos/favicon.ico') !!}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">  </script>
</head>
<body>
    <center>
        <span>Inicio de Sesion</span><br>
        <form action =  "{{route('validar')}}" method= "POST">
        {{ csrf_field() }}
            <table> 
                <tr>
                    <td>Teclea usuario</td>
                    <td><input type='text' class="form-control" name = 'nombre_usuario'></td>
                </tr>
                <tr>
                    <td>Teclea contraseña:</td>
                    <td><input type='text' class="form-control" name = 'contrasena'></td>
                </tr>
                <tr>
                    <td colspan = 2>
                    <input type = 'submit' class="btn btn-success" value = 'Ingresar'></td>           
                </tr>
        </form>
                <tr>
                    <td colspan = 2>
                    @if (Session::has('mensaje'))    
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <h6 class="alert-heading">AVISO</h6>
                            <p class="mb-0">{{ Session::get('mensaje') }}</p>
                        </div>
                    @endif
                </tr>
            <table>
    </center>
</body>
</html>