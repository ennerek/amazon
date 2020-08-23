<body style=" background-color: #EAEDED" ;>
  <nav class="navbar navbar-expand-lg navbar-light" id="barraNavegacion">
    <a class="navbar-brand logo" href="#"><img src="img/loga.png" class="logo"></a>
    <div id="botonesDrop2" class="dropdown col-sm-1">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administrar
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a style="cursor: pointer; " type="botton" class="dropdown-item" data-toggle="modal" onclick="misCompras()">Mis compras</a>
            <a style="cursor: pointer; " type="botton" class="dropdown-item" data-toggle="modal" onclick="misVentas()">Mis ventas</a>
            <a style="cursor: pointer; " type="botton" class="dropdown-item" data-toggle="modal" onclick="mostrarNuevaVenta()">Añadir Nueva Venta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../amazon/backend/api/cerrar.php">Cerrar Sesión</a>
          </div>
        </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0">
        <!--Categorias-->
        <select name="todos" id="todos" class="form-control form-control-lg">
          <option value="0" selected>Todos</option>
        </select>
        <div>
          <i type="button" onclick="verCarrito()" style="color:#E6A65E; margin-left: 25px; font-size: 25px; " class="fas fa-cart-arrow-down"></i>
        </div>
        <div id="botonesDrop" class="dropdown col-sm-1">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administrar
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a style="cursor: pointer; " type="botton" class="dropdown-item" data-toggle="modal" onclick="misCompras()">Mis compras</a>
            <a style="cursor: pointer; " type="botton" class="dropdown-item" data-toggle="modal" onclick="misVentas()">Mis ventas</a>
            <a style="cursor: pointer; " type="botton" class="dropdown-item" data-toggle="modal" onclick="mostrarNuevaVenta()">Añadir Nueva Venta</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php">Cerrar Sesión</a>
          </div>
        </div>
        <div>
          <h1 id="bienvenido" style=""> <i class="fas fa-user"></i> <?php echo $_COOKIE["nombre"] ?> </h1>
        </div>
    </div>
    </form>
    </div>
  </nav>






  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="js/controlador2.js"></script>