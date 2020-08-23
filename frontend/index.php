<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazon.com: Compras en Línea de Electrónicos, Ropa, Computadoras, ...</title>
  <link rel="shortcut icon" href="ico/aicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos.css">
  <style>
    body {
      background-size: cover;
      background-position: center center;
      background-attachment: fixed;
      margin: 0;
    }
  </style>
</head>

<body>


  <?php include("barra-navegacion.html"); ?>
  <?php include("menu-barras.html"); ?>
  <?php include("carrusel.html"); ?>
  <?php include("categorias-principales.html"); ?>


  <!--Modal registro usuario-->
  <div id="modalRegistro" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #131921; color: #ffffff;">
          <h5 class="modal-title">Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div>
          <img class="logo2" src="img/logablack" alt="">
        </div>
        <div class="modal-body form">
          <h6>Nombre<input class="modalTextos form-control" id="nombre" type="text"></h6>
          <h6>Apellido<input class="modalTextos form-control" type="text" id="apellido"></h6>
          <h6>Correo Electónico<input class="modalTextos form-control" type="text" id="correo"></h6>
          <h6>Contraseña<input class="form-control" type="password" id="contrasenia"></h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" onclick="guardarUsuario()">Registrar</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal iniciar sesion-->
  <div id="modalInicioSesion" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Iniciar Sesión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div>
          <img class="logo2" src="img/logablack" alt="">
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Correo</label>
              <input type="text" class="form-control" id="correo-inicio" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">No compartas tus datos de incio de sesión con nadie</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña</label>
              <input type="password" class="form-control" id="contrasena-inicio">
            </div>
            <div class="alert alert-danger" id="error" style="display: none"></div>
          </form>

        </div>
        <div class="modal-footer">
          <button onclick="inicioSesion()" type="button" class="btn btn-warning">Iniciar</button>
        </div>
      </div>
    </div>
  </div>


  <div id="mensaje" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mensaje</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div>
          <img class="logo2" src="img/logablack" alt="">
        </div>
        <div class="modal-body">
          <div class="alert alert-warning" role="alert">
            Inicia Sesion, si no tienes cuenta registrate con nosotros.
          </div>
          <button class="btn btn-warning botones"
      style="border-radius: 20px;height: 40px; font-family: Arial, Helvetica, sans-serif; width: 149px; margin-top: 5px; margin-left: 61px;"
      onclick="mostrarModal()">Registrate</button>

      <button class="btn btn-warning botones"
        style="width: 160px; margin-top: 5px; margin-right: 23px; margin-left: 25px;border-radius: 20px;height: 40px;font-family: Arial, Helvetica, sans-serif;"
        onclick="modalInicioSesion()" type="submit">Iniciar Sesión</button>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
  <h1 class="display-4" style="margin-left: 30px; margin-top: 29px">Compra Nuestros Productos</h1>
  <div class="row" id="todosProductos" style="margin-top: 12px; margin-left:auto; margin-right:auto">
  </div>





  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="js/controlador.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>