var subMenus = [
   {
    nombre: "Comprar por Categorías",
    link: "Comprar ahora",
    urlImg:"",
    subCategorias:  [
       { nombre:"Computadoras",
         img:"img/submenus/computadoras.jpeg"
       },
       { nombre:"Videojuegos",
         img:"img/submenus/juegos.jpeg"
       },
       { nombre:"Bebes",
         img:"img/submenus/bebes.jpeg"
       },
       { nombre:"Juguetes y Juegos",
         img:"img/submenus/juguetes.jpeg"
       }
    ]},
    {
       nombre: "AmazonBasic",
       link:"Ver más",
       urlImg:"img/submenus/basic.jpg"
    },
    {
      nombre: "Electrónicos",
      link:"Ver más",
      urlImg:"img/submenus/electronicos.jpg",
   },
   {
      nombre: "Ponte en forma en casa",
      link:"Ver más",
      urlImg:"img/submenus/ponteforma.jpg",
   },
   {
      nombre: "Computadoras y Accesorios",
      link:"Ver más",
      urlImg:"img/submenus/pc.jpg",
   },
   {
      nombre: "Seleccionados en belleza",
      link:"Ver más",
      urlImg:"img/submenus/belleza.jpg",
   },
   {
      nombre: "Pago Seguro",
      link:"Ver más",
      urlImg:"img/submenus/pago.jpg",
   }
   ];
var seleccionar = [
       {
          id: 0,
          nombre:"Todos"
       },
       {
         id: 1,
         nombre:"Arte y Artesanías"
      },
      {
         id: 2,
         nombre: "Automotriz"
      },
      {
         id: 3,
         nombre: "Bebé"
      },
      {
         id: 4,
         nombre: "Belleza y cuidado personal"
      },
      {
         id: 5,
         nombre:"Computadoras"
      },
      {
         id: 6,
         nombre:"Electrónicos"
      },
      {
         id: 7,
         nombre:"Libros"
      },
      {
         id: 8,
         nombre:"Música Mp3"
      },
      {
         id: 9,
         nombre:"Prime Video"
      },
      {
         id: 10,
         nombre:"Tienda Kindle"
      },
      {
         id: 11,
         nombre:"Moda para Mujer"
      },
      {
         id: 12,
         nombre:"Moda para Hombre"
      },
      {
         id: 13,
         nombre:"Moda niñas"
      },
      {
         id: 14,
         nombre:"Moda de niños"
      },
      {
         id: 15,
         nombre:"Cine y TV"
      },
      {
         id: 16,
         nombre:"Deportes y actividades al aire libre"
      },
      {
         id: 17,
         nombre:"Equipaje"
      },
      {
         id: 18,
         nombre:"Herramientas y mejoramiento del hogar"
      },
      {
         id: 19,
         nombre:"Hogar y cocina"
      },
      {
         id: 20,
         nombre:"Industrial y Científico"
      },
      {
         id: 21,
         nombre:"Insumos para mascotas"
      },
      {
         id: 22,
         nombre:"Juguetes y Juegos"
      },
      {
         id: 23,
         nombre:"Música, CD y vinilos"
      },
      {
         id: 24,
         nombre:"Ofertas"
      },
      {
         id: 25,
         nombre:"Salud y productos para el hogar"
      },
      {
         id: 26,
         nombre:"Software"
      },
      {
         id: 27,
         nombre:"VideoJuegos"
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
   seleccionar.forEach(function(selec, i) {
      document.getElementById('todos').innerHTML += 
      `<option id="categoriasSelect" value="'${i}'">${selec.nombre}</option>`      
   });
   
}
todos();

//genera categorias principales
function generarCategorias(){
   subMenus.forEach(function(menu, i) {
      document.getElementById('categoriasPrincipales').innerHTML +=
      `<div class="card" style="width: 20rem; height: 23rem; margin-left: 18px; margin-top: 18px">
       <div class="card-body">
        <h5 class="card-title">${menu.nombre}</h5>
        <img src=${menu.urlImg} class="card-img-top" alt="">
        <p class="card-text"><a href="">${menu.link}</a></p>
      </div>
    </div>  `
      
   });
}
generarCategorias();



