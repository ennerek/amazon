<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazon.com: Compras en Línea de Electrónicos, Ropa, Computadoras, ...</title>
  <link rel="shortcut icon" href="ico/aicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
    integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
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
  <h1 class="display-4" style="margin-left: 50px;">Compra Nuestros Productos</h1>
  <div class="row" id="todosProductos" style="margin-top:38px; margin-left:auto; margin-right:auto"> </div>
 
    <!--Modal-->
    <div id="modalRegistro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #131921; color: #ffffff;">
                    <h5 class="modal-title">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body form">
                    <h6>Nombre<input class="modalTextos form-control" id="nombre" type="text"></h6>
                    <h6>Apellido<input class="modalTextos form-control" type="text" id="apellido"></h6>
                    <h6>Correo Electónico<input class="modalTextos form-control" type="text" id="correo"></h6>
                    <h6>Contraseña<input class="form-control" type="password" id="contrasenia"></h6>
                    </div>
                <div class="modal-footer">
                    <button style="background-color:#131921" type="button" class="btn btn-primary" onclick="guardar()">Registrar</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"></script>      
    <script src="js/controlador.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>