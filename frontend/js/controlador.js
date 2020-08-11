var usuarios = [];
const url1 = '../../amazon/backend/api/usuario.php';

var subMenus = [
   {
      id: 0,
      categoria: "Todos",
      link: "Comprar ahora",
      urlImg: " ",
      subCategorias: [
         {
            nombre: "Computadoras",
            img: "img/submenus/computadora.jpeg"
         },
         {
            nombre: "Videojuegos",
            img: "img/submenus/juegos.jpeg"
         },
         {
            nombre: "Bebes",
            img: "img/submenus/bebes.jpeg"
         },
         {
            nombre: "Juguetes y Juegos",
            img: "img/submenus/juguetes.jpeg"
         }
      ]
   },
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
//genera los submenus del select
function todos() {
   seleccionar.forEach(function (selec, i) {
      document.getElementById('todos').innerHTML +=
         `<option id="categoriasSelect" value="'${i}'">${selec.nombre}</option>`
   });

}
todos();

//genera categorias principales
function generarCategorias() {

   subMenus.forEach(function (menu, i) {
      document.getElementById('categoriasPrincipales').innerHTML +=
         `<div class="card" style="width: 20rem; height: 23rem; margin-left: 18px; margin-top: 18px">
       <div class="card-body">
        <h5 class="card-title">${menu.categoria}</h5>
        <img src=${menu.urlImg} class="card-img-top" alt="">
        <p class="card-text"><a href="">${menu.link}</a></p>
      </div>
    </div>  `

   });
}
generarCategorias();
//Muestra el modal de registro
function mostrarModal() {
   $("#modalRegistro").modal("show");
}

//Obtiene archivos del la data de los usuarios
function obtenerUsuarios() {
   axios({
      method: 'GET',
      url: url1,
      responseType: 'json'
   }).then(res => {
      console.log(res.data);
      usuarios = res.data;
      for (let i = 0; i < res.data.length; i++) {
         document.getElementById('susuarios').innerHTML +=
            `<option value="${res.data[i].idUsuario}">${res.data[i].nombre}</option>`;
      }
      //document.getElementById('susuario').value = null;
   }).catch(error => {
      console.error(error);
   });

}

obtenerUsuarios();

//Guarda el registro de un usuario
function guardar() {
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

//Obtiene todos los productos y luego los genera
function obtenerProductos() {
   var el = document.getElementById('categoriasPrincipales');
   el.style.display = (el.style.display == 'none');
   axios({
      method: 'GET',
      url: '../../amazon/backend/api/todos.php',
      responseType: 'json'
   }).then(res => {
      console.log(res.data);
      usuarios = res.data;
      for (let i = 0; i < res.data.length; i++) {
         document.getElementById('todosProductos').innerHTML +=
            `<div class="card" style="margin-top: 12px; margin-bottom: 12px; margin-left: 20px; width: 13rem; heigth: 4rem; box-shadow: 8px 10px 28px 0px rgba(148,148,148,1);">
             <img src="${res.data[i].imagen}" class="card-img-top" alt="...">
             <div class="card-body">
               <h5 class="card-title">${res.data[i].nombreProducto}</h5>
               <p class="card-text">${res.data[i].descripcion}</p>
               <h5>${res.data[i].precio}<i style="color: #E6A147; margin-left:12px; font-size: 20px"class="fas fa-cart-plus" type="button"> </i></h5>
               <a href="#" class="" style="" id="comprar"><button type="button" class="btn btn-warning">Comprar</button></a>
             </div>
           </div`;
      }

   }).catch(error => {
      console.error(error);
   });
}
obtenerProductos();



