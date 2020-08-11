<?php
   
   
   class Todos {
       private $idCategoria;
       private $nombreCategoria;       
       private $nombreProducto;
       private $precio;
       private $imagen;
       private $descripcion;
       private $calificacion;

       function __construct( 
            $idCategoria
          , $nombreCategoria      
          , $nombreProducto
          , $precio
          , $imagen
          , $descripcion
          , $calificacion

       ){
       $this->idCategoria = $idCategoria;
       $this->nombreCategoria = $nombreCategoria;
       $this->nombreProducto = $nombreProducto;
       $this->precio = $precio;
       $this->imagen = $imagen;
       $this->descripcion = $descripcion;
       $this->calificacion = $calificacion;

       }
        
       public static function obtenerTodos(){
              $contenido = file_get_contents("../data/todos.json");
              echo $contenido;
        }
       /**
        * Get the value of idCategoria
        */ 
       public function getIdCategoria()
       {
              return $this->idCategoria;
       }

       /**
        * Set the value of idCategoria
        *
        * @return  self
        */ 
       public function setIdCategoria($idCategoria)
       {
              $this->idCategoria = $idCategoria;

              return $this;
       }

       /**
        * Get the value of nombreCategoria
        */ 
       public function getNombreCategoria()
       {
              return $this->nombreCategoria;
       }

       /**
        * Set the value of nombreCategoria
        *
        * @return  self
        */ 
       public function setNombreCategoria($nombreCategoria)
       {
              $this->nombreCategoria = $nombreCategoria;

              return $this;
       }

       /**
        * Get the value of nombreProducto
        */ 
       public function getNombreProducto()
       {
              return $this->nombreProducto;
       }

       /**
        * Set the value of nombreProducto
        *
        * @return  self
        */ 
       public function setNombreProducto($nombreProducto)
       {
              $this->nombreProducto = $nombreProducto;

              return $this;
       }

       /**
        * Get the value of precio
        */ 
       public function getPrecio()
       {
              return $this->precio;
       }

       /**
        * Set the value of precio
        *
        * @return  self
        */ 
       public function setPrecio($precio)
       {
              $this->precio = $precio;

              return $this;
       }

       /**
        * Get the value of imagen
        */ 
       public function getImagen()
       {
              return $this->imagen;
       }

       /**
        * Set the value of imagen
        *
        * @return  self
        */ 
       public function setImagen($imagen)
       {
              $this->imagen = $imagen;

              return $this;
       }

       /**
        * Get the value of descripcion
        */ 
       public function getDescripcion()
       {
              return $this->descripcion;
       }

       /**
        * Set the value of descripcion
        *
        * @return  self
        */ 
       public function setDescripcion($descripcion)
       {
              $this->descripcion = $descripcion;

              return $this;
       }

       /**
        * Get the value of calificacion
        */ 
       public function getCalificacion()
       {
              return $this->calificacion;
       }

       /**
        * Set the value of calificacion
        *
        * @return  self
        */ 
       public function setCalificacion($calificacion)
       {
              $this->calificacion = $calificacion;

              return $this;
       }
   }
?>