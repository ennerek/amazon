var usuarios = [];
var ventas = [];
var carrito = [];


var usuarioActual;
const url1 = "../../amazon/backend/api/usuario.php";
const url2 = "../../amazon/backend/api/ventas.php";
var misCookies = document.cookie;
var seleccionar = [
   {
      idCategoria: 1,
      nombre: "Eletrónicos",
   },
   {
      idCategoria: 2,
      nombre: "Salud",
   },
   {
      idCategoria: 3,
      nombre: "Belleza",
   },
   {
      idCategoria: 4,
      nombre: "Hogar y cocina",
   },
   {
      idCategoria: 5,
      nombre: "Computadoras y Útiles Escolares",
   },
];

function leerCookie() {
   var idUsuario = "idUsuario"
   var aCookies = misCookies.split(";");
   var contador;
   var posicionSignoIgual;
   var nombreCookie;
   var valorCookie;
   for (contador = 0; contador < aCookies.length; contador++) {
      posicionSignoIgual = aCookies[contador].indexOf("=");
      nombreCookie = aCookies[contador].substring(0, posicionSignoIgual).replace(" ", "");
      if (nombreCookie == idUsuario) {

         valorCookie = aCookies[contador].substring(posicionSignoIgual + 1);
      }
   }
   return valorCookie;
}
usuarioActual = leerCookie();
console.log(usuarioActual);


function todos() {
   seleccionar.forEach(function (selec, i) {
      document.getElementById(
         "todos"
      ).innerHTML += `<option id="categoriasSelect" value="'${i}'">${selec.nombre}</option>`;
   });
}
todos();
//Obtiene los usuarios registrados
function obtenerUsuarios() {
   axios({
      method: "GET",
      url: url1,
      responseType: "json",
   })
      .then((res) => {
         console.log(res.data);
         usuarios = res.data;
      })
      .catch((error) => {
         console.error(error);
      });
}
obtenerUsuarios();

//Guarda el registro de un usuario
function guardarUsuario() {
   var id = 0;
   usuarios.forEach((app) => {
      id = id + 1;
   });

   let usuario = {
      idUsuario: id,
      nombre: document.getElementById("nombre").value,
      apellido: document.getElementById("apellido").value,
      correo: document.getElementById("correo").value,
      contrasenia: document.getElementById("contrasenia").value,
   };
   console.log("Usuario a guardar", usuario);
   axios({
      method: "POST",
      url: url1,
      responseType: "json",
      data: usuario,
   })
      .then((res) => {
         console.log(res.data);
      })
      .catch((error) => {
         console.error(error);
      });
   $("#modalRegistro").modal("hide");
}

//Obtiene todos los productos y luego los genera
function obtenerProductos() {
   axios({
      method: "GET",
      url: "../../amazon/backend/api/todos.php",
      responseType: "json",
   })
      .then((res) => {
         console.log(res.data);
         usuarios = res.data;
         for (let i = 0; i < res.data.length; i++) {
            document.getElementById("todosProductos").innerHTML +=
               `<div id="productoVenta" value="${i}" class="card" style="margin-top: 12px; margin-bottom: 12px; margin-left: 20px; width: 13rem; heigth: 4rem; box-shadow: 8px 10px 28px 0px rgba(148,148,148,1);">
             <img style="height: 188px;"id="imagenC" value="${res.data[i].imagen} "src="${res.data[i].imagen}" class="card-img-top" alt="...">
             <div class="card-body">
               <h5 id="nombreC" class="card-title" value="${res.data[i].nombreProducto}">${res.data[i].nombreProducto}</h5>
               <p id="descripcionC" class="card-text value="${res.data[i].descripcion}">${res.data[i].descripcion}</p>
               <h5 id="precioC" value="${res.data[i].precio}">Lps. ${res.data[i].precio} <i  id="carrito" onclick="anadirCarrito(${i})"style="color: #E6A147; margin-left:12px; font-size: 20px"class="fas fa-cart-plus" type="button"></i></h5>
               <button style=" margin-top:16px;" id="comprar" onclick="anadirCompra(${i})" type="button" class="btn btn-warning">Comprar</button>
             </div>
           </div`;
         }
      })
      .catch((error) => {
         console.error(error);
      });
}
obtenerProductos();

function mostrarNuevaVenta() {
   $("#nuevaVenta").modal("show");
}
//Muestra las ventas del usuario que esta activo
function misVentas() {
   $("#modal-mis-ventas").modal("show");
   axios({
      url: '../backend/api/ventas.php?idUsuario=' + usuarioActual,
      method: 'get',
      responseType: 'json'
   }).then((res) => {
      console.log(res.data);
      ventas = Object.values(res.data);
      for (let i = 0; i < ventas.length; i++) {
         document.getElementById("generar-ventas").innerHTML +=
            `<div class="card" style="width: 14rem; heigth: 2rem; margin-left: 12px; margin-top: 12px;">
        <img style="height: 188px;"src="${ventas[i].imagen}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${ventas[i].nombreProducto}</h5>
          <p class="card-text">${ventas[i].descripcion}</p>
          <h5 class="card-title">Lps. ${ventas[i].precio}  <i type="botton" onclick="eliminarVenta(${i})"class="far fa-trash-alt" style="color: #EA4335;"></i> </h5>
         </div>
      </div>`
      }
   }).catch((error) => {
      console.error(error);
   });
   document.getElementById("generar-ventas").innerHTML = '';
}
//Añade una nueva producto para ponerlo en venta
function anadirVenta() {
   var id = 0;
   ventas.forEach((app) => {
      id = id + 1;
   });
   let venta = {
      idProducto: id,
      idUsuario: usuarioActual,
      idCategoria: document.getElementById("categoriaVenta").value,
      nombreProducto: document.getElementById("nombreV").value,
      precio: document.getElementById("precioV").value,
      descripcion: document.getElementById("descripcionV").value,
      imagen: document.getElementById("imagenV").value,
   };
   console.log("venta", venta);

   axios({
      url: "../backend/api/ventas.php",
      method: "post",
      responseType: "json",
      data: venta,
   });
   $("#nuevaVenta").modal("hide");

   axios({
      url: "../../amazon/backend/api/todos.php",
      method: "post",
      responseType: "json",
      data: venta,
   });
   document.getElementById("todosProductos").innerHTML = " ";
   obtenerProductos();
}

//Añade un producto a las compras realizadas
function anadirCompra(id) {
   var n = id;
   var auxiliar = [];
   axios({
      method: "GET",
      url: "../../amazon/backend/api/todos.php",
      responseType: "json",
   })
      .then((res) => {
         console.log(res.data);
         auxiliar = res.data;
         for (let i = 0; i < auxiliar.length; i++) {
            if (auxiliar[n] == auxiliar[i]) {
               console.log("producto", i);
               var idCategoria = auxiliar[i].idCategoria;
               var nombreProducto = auxiliar[i].nombreProducto;
               var precio = auxiliar[i].precio;
               var descripcion = auxiliar[i].descripcion;
               var imagen = auxiliar[i].imagen;
               break;
            }
         }
         let compra = {
            idUsuario: usuarioActual,
            idCategoria: idCategoria,
            nombreProducto: nombreProducto,
            precio: precio,
            descripcion: descripcion,
            imagen: imagen,
         };
         console.log("compra", compra);

         axios({
            url: "../backend/api/compras.php",
            method: "post",
            responseType: "json",
            data: compra,
         })
      })
      .catch((error) => {
         console.error(error);
      });
   window.confirm("Añadido a tus compras");
}

//Muestra las compras del usuario que esta activo
function misCompras() {
   $("#modal-mis-compras").modal("show");
   axios({
      url: '../backend/api/compras.php?idUsuario=' + usuarioActual,
      method: 'get',
      responseType: 'json'
   }).then((res) => {
      console.log(res.data);
      compras = Object.values(res.data);
      for (let i = 0; i < compras.length; i++) {
         document.getElementById('generar-compras').innerHTML +=
            `<div class="card" style="width: 14rem; heigth: 2rem; margin-left: 12px; margin-top: 12px;">
        <img style="height: 188px;"src="${compras[i].imagen}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${compras[i].nombreProducto}</h5>
          <h5 class="card-title">Lps. ${compras[i].precio}</h5>
         </div>
      </div>`
      }
   }).catch((error) => {
      console.error(error);
   });
   document.getElementById("generar-compras").innerHTML = '';

}
//Añade una nueva producto al carrito
function anadirCarrito(id) {
   var n = id;
   var auxiliar = [];
   axios({
      method: "GET",
      url: "../../amazon/backend/api/todos.php",
      responseType: "json",
   })
      .then((res) => {
         console.log(res.data);
         auxiliar = res.data;
         for (let i = 0; i < auxiliar.length; i++) {
            if (auxiliar[n] == auxiliar[i]) {
               console.log("producto", i);
               var idCategoria = auxiliar[i].idCategoria;
               var nombreProducto = auxiliar[i].nombreProducto;
               var precio = auxiliar[i].precio;
               var descripcion = auxiliar[i].descripcion;
               var imagen = auxiliar[i].imagen;
               break;
            }
         }
         let carrito = {
            idProducto: id,
            idUsuario: usuarioActual,
            idCategoria: idCategoria,
            nombreProducto: nombreProducto,
            precio: precio,
            descripcion: descripcion,
            imagen: imagen,
         };
         console.log("info", carrito);

         axios({
            url: "../backend/api/carrito.php",
            method: "post",
            responseType: "json",
            data: carrito,
         })
      })
      .catch((error) => {
         console.error(error);
      });
   window.confirm("Añadido correctamente");

}
//Muestra los articulos que se añaden al carrito del usuario que esta activo
function verCarrito() {
   $("#modal-carrito").modal("show");
   axios({
      url: '../backend/api/carrito.php?idUsuario=' + usuarioActual,
      method: 'get',
      responseType: 'json'
   }).then((res) => {
      console.log(res.data);
      carrito = Object.values(res.data);
      for (let i = 0; i < carrito.length; i++) {
         document.getElementById("generar-carrito").innerHTML +=
            `<div class="card" style="width: 14rem; heigth: 2rem; margin-left: 12px; margin-top: 12px;">
        <img style="height: 188px;"src="${carrito[i].imagen}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${carrito[i].nombreProducto}</h5>
          <p class="card-text">${carrito[i].descripcion}</p>
          <h5 class="card-title">Lps. ${carrito[i].precio}  <i type="botton" onclick="eliminarCarrito(${i})"class="far fa-trash-alt" style="color: #EA4335;"></i> </h5>
          <button style=" margin-top:16px;" id="comprar" onclick="anadirCompra(${i})" type="button" class="btn btn-warning">Comprar</button>
          </div>
      </div>`
      }
   }).catch((error) => {
      console.error(error);
   });
   document.getElementById("generar-carrito").innerHTML = '';

}

function eliminarVenta(id) {
   console.log("Eliminar venta indice", id)
   axios({
      url: '../backend/api/ventas.php?idProducto=' + id,
      method: 'DELETE',
      responseType: 'json'
   }).then((res) => {
      console.log(res.data);
   }).catch((error) => {
      console.error(error);
   });
   misVentas();

}
function eliminarCarrito(id) {
   console.log("Eliminar articulo indice", id)
   axios({
      url: '../backend/api/carrito.php?idProducto=' + id,
      method: 'DELETE',
      responseType: 'json'
   }).then((res) => {
      console.log(res.data);
   }).catch((error) => {
      console.error(error);
   });
   verCarrito();

}
