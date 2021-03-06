<?php 
    class Compra{
        private $idUsuario;
        private $idCategoria;
        private $nombreProducto;
        private $precio;
        private $descripcion;
        private $imagen;

        public function __construct(
            $idUsuario,
            $idCategoria,
            $nombreProducto,
            $precio,
            $descripcion,
            $imagen
    
        )
        {
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
   

    public function anadirCompra() {
     $contenido = file_get_contents("../data/mis-compras.json");
        $compra = json_decode($contenido, true);
        $compra[] = array(
            "idUsuario" => $this->idUsuario,
            "idCategoria" => $this->idCategoria,
            "nombreProducto" => $this->nombreProducto, 
            "precio" => $this->precio,
            "descripcion" => $this->descripcion,
            "imagen" => $this->imagen,
        );
        $archivo = fopen("../data/mis-compras.json", "w");
        fwrite($archivo, json_encode($compra));
        fclose($archivo);   
    }

    public static function obtenerCompra($idUsuario){
        $contenidoArchivo = file_get_contents('../data/mis-compras.json');
        $compras = json_decode($contenidoArchivo, true);
        $compra = array();
        for ($i=0;$i<sizeof($compras);$i++){
            if($compras[$i]['idUsuario'] == $idUsuario){
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

    }
