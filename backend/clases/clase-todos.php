<?php
   
   
   class Todos {
       private $idUsuario;
       private $idCategoria;       
       private $nombreProducto;
       private $precio;
       private $descripcion;
       private $imagen;       
       

       function __construct( 
            $idUsuario
          , $idCategoria      
          , $nombreProducto
          , $precio
          , $descripcion
          , $imagen
       ){
       $this->idUsuario = $idUsuario;
       $this->idCategoria = $idCategoria;
       $this->nombreProducto = $nombreProducto;
       $this->precio = $precio;
       $this->descripcion = $descripcion;
       $this->imagen = $imagen;n;

       }
        
       public static function obtenerTodos(){
              $contenido = file_get_contents("../data/todos.json");
              echo $contenido;
        }
        public function guardarTodo() {
              $contenido = file_get_contents("../data/todos.json");
              $venta = json_decode($contenido, true);
              $venta[] = array(
                  "idUsuario" => $this->idUsuario,
                  "idCategoria" => $this->idCategoria,
                  "nombreProducto" => $this->nombreProducto, 
                  "precio" => $this->precio,
                  "descripcion" => $this->descripcion,
                  "imagen" => $this->imagen,
              );
              $archivo = fopen("../data/todos.json", "w");
              fwrite($archivo, json_encode($venta));
              fclose($archivo);
          }
        

       /**
        * Get the value of idUsuario
        */ 
       public function getIdUsuario()
       {
              return $this->idUsuario;
       }

       /**
        * Set the value of idUsuario
        *
        * @return  self
        */ 
       public function setIdUsuario($idUsuario)
       {
              $this->idUsuario = $idUsuario;

              return $this;
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
   }
?>