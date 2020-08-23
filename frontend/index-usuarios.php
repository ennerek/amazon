<?php 
session_start();
  if(!isset($_SESSION["token"])){
    header("Location: index.php");
  }
  if(!isset($_COOKIE["token"])){
    header("Location: index.php");
  }
  if($_SESSION["token"] != $_COOKIE["token"] ){
    header("Location: index.php");
  }


?>


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

  <?php include("barra-navegacion-usuario.php"); ?>
  <h1 class="display-4" style="margin-left: 30px; margin-top: 29px">Compra Nuestros Productos</h1>
  <div class="row" id="todosProductos" style="margin-top: 12px; margin-left:auto; margin-right:auto">
  </div>
  <!--Modal formulario de nueva venta-->
  <div id="nuevaVenta" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ingrese Datos del Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" id="nombreV">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Precio</label>
                <input type="text" class="form-control" id="precioV">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Descripción</label>
              <input type="text" class="form-control" id="descripcionV" placeholder="">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Url de la imagen</label>
                <input type="text" class="form-control" id="imagenV">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Categoria</label>
                <select id="categoriaVenta" class="form-control">
                  <option selected>Elegir Categoría</option>
                  <option value="1" id="1">Electrónicos</option>
                  <option value="2" id="2">Salud</option>
                  <option value="3" id="3">Belleza</option>
                  <option value="4" id="4">Hogar y cocina</option>
                  <option value="5" id="5">Computadoras y Útiles Escolares</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success" onclick="anadirVenta()">Poner en venta</button>
        </div>
      </div>
    </div>
  </div>

  <!--Modal ventas-->
  <div id="modal-mis-ventas" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="ventas-titulo" class="modal-title">Mis Productos en Venta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="generar-ventas" class="row">


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!--Modal ccompras-->
  <div id="modal-mis-compras" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="ventas-titulo" class="modal-title">Historial de Compras</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="generar-compras" class="row">


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
  <!--Modal carrito-->
  <div id="modal-carrito" class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="ventas-titulo" class="modal-title">Articulos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="generar-carrito" class="row">


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
  




  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="js/controlador2.js"></script>

</body>

</html>