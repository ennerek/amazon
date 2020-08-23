<?php

  class Venta {
       private $idProducto;
       private $idUsuario;
       private $idCategoria;
       private $nombreProducto;
       private $precio;
       private $descripcion;
       private $imagen;

       public function __construct(
          $idProducto,
          $idUsuario,
          $idCategoria,
          $nombreProducto,
          $precio,
          $descripcion,
          $imagen
  
      )
      {
       $this->idProducto = $idProducto;
          $this->idUsuario = $idUsuario;
          $this->idCategoria= $idCategoria;
          $this->nombreProducto = $nombreProducto;
          $this->precio = $precio;
          $this->descripcion= $descripcion;
          $this->imagen = $imagen;
        
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
        /**
        * Get the value of idProducto
        */ 
        public function getIdProducto()
        {
               return $this->idProducto;
        }
 
        /**
         * Set the value of idProducto
         *
         * @return  self
         */ 
        public function setIdProducto($idProducto)
        {
               $this->idProducto = $idProducto;
 
               return $this;
        }
       
       public function anadirVenta() {
          $contenido = file_get_contents("../data/mis-ventas.json");
          $venta = json_decode($contenido, true);
          $venta[] = array(
              "idProducto" => $this->idProducto,   
              "idUsuario" => $this->idUsuario,
              "idCategoria" => $this->idCategoria,
              "nombreProducto" => $this->nombreProducto, 
              "precio" => $this->precio,
              "descripcion" => $this->descripcion,
              "imagen" => $this->imagen,
          );
          $archivo = fopen("../data/mis-ventas.json", "w");
          fwrite($archivo, json_encode($venta));
          fclose($archivo);
      }

      public static function obtenerVenta($idUsuario){
          $contenidoArchivo = file_get_contents('../data/mis-ventas.json');
          $ventas = json_decode($contenidoArchivo,true);
          $venta = array();
          for ($i=0;$i<sizeof($ventas);$i++){
              if($ventas[$i]['idUsuario'] == $idUsuario){
                     $venta[$i]['idProducto'] = $ventas[$i]['idProducto'];
                     $venta[$i]['idUsuario'] = $ventas[$i]['idUsuario'];
                     $venta[$i]['idCategoria'] = $ventas[$i]['idCategoria'];
                     $venta[$i]['nombreProducto'] = $ventas[$i]['nombreProducto'];
                     $venta[$i]['precio'] = $ventas[$i]['precio'];
                     $venta[$i]['descripcion'] = $ventas[$i]['descripcion'];
                     $venta[$i]['imagen'] = $ventas[$i]['imagen'];            
              };
          };
          echo json_encode($venta);
      }

      public static function eliminarArticulo($idProducto){
       $contenidoArchivo = file_get_contents('../data/mis-ventas.json');
       $ventas = json_decode($contenidoArchivo,true);
       array_splice($ventas, $idProducto,1);
       $archivo = fopen("../data/mis-ventas.json", "w");
          fwrite($archivo, json_encode($ventas));
          fclose($archivo);                
      }


      
     }

?>