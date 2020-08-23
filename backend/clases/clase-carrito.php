<?php 
    class Carrito{
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
   

    public function anadirCarrito() {
     $contenido = file_get_contents("../data/carrito.json");
        $compra = json_decode($contenido, true);
        $compra[] = array(
            "idProducto" => $this->idProducto,
            "idUsuario" => $this->idUsuario,
            "idCategoria" => $this->idCategoria,
            "nombreProducto" => $this->nombreProducto, 
            "precio" => $this->precio,
            "descripcion" => $this->descripcion,
            "imagen" => $this->imagen,
        );
        $archivo = fopen("../data/carrito.json", "w");
        fwrite($archivo, json_encode($compra));
        fclose($archivo);   
    }

    public static function obtenerCarrito($idUsuario){
        $contenidoArchivo = file_get_contents('../data/carrito.json');
        $compras = json_decode($contenidoArchivo, true);
        $compra = array();
        for ($i=0;$i<sizeof($compras);$i++){
            if($compras[$i]['idUsuario'] == $idUsuario){
                   $compra[$i]['idProducto'] = $compras[$i]['idProducto'];
                   $compra[$i]['idUsuario'] = $compras[$i]['idUsuario'];
                   $compra[$i]['idCategoria'] =$compras[$i]['idCategoria'];
                   $compra[$i]['nombreProducto'] = $compras[$i]['nombreProducto'];
                   $compra[$i]['precio'] = $compras[$i]['precio'];
                   $compra[$i]['descripcion'] =$compras[$i]['descripcion'];
                   $compra[$i]['imagen'] = $compras[$i]['imagen'];            
            };
        };
        echo json_encode($compra);
    }
    public static function eliminarArticulo($idProducto){
        $contenidoArchivo = file_get_contents('../data/carrito.json');
        $carrito = json_decode($contenidoArchivo,true);
        array_splice($carrito, $idProducto,1);
        $archivo = fopen("../data/carrito.json", "w");
           fwrite($archivo, json_encode($carrito));
           fclose($archivo);                
       }
 


    }
