var usuarios = [];
const url1 = '../../amazon/backend/api/usuario.php';

var subMenus = [
   {
      id: 1,
      categoria: "AmazonBasic",
      link: "Ver más",
      urlImg: "img/submenus/basic.jpg"
   },
   {
      id: 2,
      categoria: "Electrónicos",
      link: "Ver más",
      urlImg: "img/submenus/electronicos.jpg",
   },
   {
      id: 3,
      categoria: "Ponte en forma en casa",
      link: "Ver más",
      urlImg: "img/submenus/ponteforma.jpg",
   },
   {
      id: 4,
      categoria: "Computadoras y Accesorios",
      link: "Ver más",
      urlImg: "img/submenus/pc.jpg",
   },
   {
      id: 5,
      categoria: "Seleccionados en belleza",
      link: "Ver más",
      urlImg: "img/submenus/belleza.jpg",
   },
   {
      id: 6,
      categoria: "Pago Seguro",
      link: "Ver más",
      urlImg: "img/submenus/pago.jpg",
   }
];
var seleccionar = [
   {
      idCategoria: 0,
      nombre: "Todos"
   },
   {
      idCategoria: 1,
      nombre: "Eletrónicos"
   },
   {
      idCategoria: 2,
      nombre: "Salud"
   },
   {
      idCategoria: 3,
      nombre: "Belleza"
   },
   {
      idCategoria: 4,
      nombre: "Hogar y cocina"
   },
   {
      idCategoria: 5,
      nombre: "Computadoras"
   },
];

//muestra y cierra el menu de el boton de barras
function mostrarMenu() {
   var el = document.getElementById('grid');
   el.style.display = (el.style.display == 'none') ? 'block' : 'none';
}
function cerrarMenu() {
   var el = document.getElementById('grid');
   el.style.display = (el.style.display == 'none') ? 'block' : 'none';
}
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
//genera categorias principales
function generarCategorias() {

   subMenus.forEach(function (menu, i) {
      document.getElementById('categoriasPrincipales').innerHTML +=
         `<div class="card" style="width: 20rem; height: 23rem; margin-left: 18px; margin-top: 18px">
       <div class="card-body">
        <h5 class="card-title">${menu.categoria}</h5>
        <img src=${menu.urlImg} class="card-img-top" alt="">
         </div>
    </div>  `

   });
}
generarCategorias();
//Muestra el modal de registro
function mostrarModal() {
   $("#mensaje").modal("hide");
   $("#modalRegistro").modal("show");
}
//Resgitra un usuario
function guardarUsuario() {
   var id = 0;
   usuarios.forEach(app => {
      id = id + 1;
   });

   let usuario = {
      idUsuario: id,
      nombre: document.getElementById('nombre').value,
      apellido: document.getElementById('apellido').value,
      correo: document.getElementById('correo').value,
      contrasenia: document.getElementById('contrasenia').value
   };
   console.log('Usuario a guardar', usuario)
   axios({
      method: 'POST',
      url: url1,
      responseType: 'json',
      data: usuario

   }).then(res => {
      console.log(res.data);
   }).catch(error => {
      console.error(error);
   });
   $("#modalRegistro").modal("hide");
}
function modalInicioSesion(){
   $("#mensaje").modal("hide");
   $("#modalInicioSesion").modal("show");
}


function inicioSesion(){
   $("#mensaje").modal("hide");
   axios({
      url:'../../amazon/backend/api/inicio.php',
      method: 'POST',
      responseType: "json",
      data:{
         correo: document.getElementById('correo-inicio').value ,
         contrasenia: document.getElementById('contrasena-inicio').value
      }
   }).then((res =>{
      console.log(res);
      if(res.data.codigoResultado == 1){
         window.location.href= "index-usuarios.php";
      }else{
         document.getElementById('error').style.display = 'block';
         document.getElementById('error').innerHTML = res.data.mensaje;
      }
      console.log(res);
   })).catch((error =>{
         console.log(error);
      }))
}

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
               <h5 id="precioC" value="${res.data[i].precio}">Lps. ${res.data[i].precio} <i  id="carrito" onclick="mensaje()"style="color: #E6A147; margin-left:12px; font-size: 20px"class="fas fa-cart-plus" type="button"></i></h5>
               <button style=" margin-top:16px;" id="comprar" onclick="mensaje()" type="button" class="btn btn-warning">Comprar</button>
             </div>
           </div`;
         }
      })
      .catch((error) => {
         console.error(error);
      });
}
obtenerProductos();

function mensaje(){
   $("#mensaje").modal("show");
      
}


