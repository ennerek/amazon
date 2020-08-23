<?php 
   
        class Usuario {
            private $idUsuario;
            private $nombre;
            private $apellido;
            private $correo;
            private $contrasenia; 
            
            //private $productoCompra;   
            //private $productoVenta;                     
    
            public function __construct(
                $idUsuario,
                $nombre,
                $apellido,
                $correo,
                $contrasenia
                
                //$productoCompra,
                //$productoVenta
            )
            {
                $this->idUsuario = $idUsuario;
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->correo = $correo;
                $this->contrasenia = $contrasenia;
                
                //$this->productoCompra;
                //$this->ProductoVenta;
    
              }

            /**
             * Get the value of id
             */ 
            public function getIdUsuario()
            {
                        return $this->idUsuario;
            }

            /**
             * Set the value of id
             *
             * @return  self
             */ 
            public function setIdUsuario($idUsuario)
            {
                        $this->idUsuario = $idUsuario;

                        return $this;
            }

            /**
             * Get the value of nombre
             */ 
            public function getNombre()
            {
                        return $this->nombre;
            }

            /**
             * Set the value of nombre
             *
             * @return  self
             */ 
            public function setNombre($nombre)
            {
                        $this->nombre = $nombre;

                        return $this;
            }

            /**
             * Get the value of correo
             */ 
            public function getCorreo()
            {
                        return $this->correo;
            }

            /**
             * Set the value of correo
             *
             * @return  self
             */ 
            public function setCorreo($correo)
            {
                        $this->correo = $correo;

                        return $this;
            }

            /**
             * Get the value of contrasenia
             */ 
            public function getContrasenia()
            {
                        return $this->contrasenia;
            }

            /**
             * Set the value of contrasenia
             *
             * @return  self
             */ 
            public function setContrasenia($contrasenia)
            {
                        $this->contrasenia = $contrasenia;

                        return $this;
                    }
                     /**
             * Get the value of apellido
             */ 
            public function getApellido()
            {
                        return $this->apellido;
            }

            /**
             * Set the value of apellido
             *
             * @return  self
             */ 
            public function setApellido($apellido)
            {
                        $this->apellido = $apellido;

                        return $this;
            }
           
            /**public function getProductoCompra()
            {
                        return $this->productoCompra;
            }        
            *public function setProductoCompra($productocompra)
            {
                        $this->ProductoCompra = $productoCompra;

                        return $this;
            }                     
            public function getProductoVenta()
            {
                        return $this->productoVenta;
            }
            public function setProductoVenta($productoVenta)
            {
                        $this->productoVenta = $productoVenta;

                        return $this;
            }*/

        /*public function __toString(){
               return $this->idUsuario ." ".$this->nombre ." ".$this->correo ." ".$this->contrasenia." ".$this->apellido;
        }*/

        //CRUD
        public function guardarUsuario() {
            $contenido = file_get_contents("../data/usuarios.json");
            $usuario = json_decode($contenido, true);
            $usuario[] = array(
                "idUsuario"=> $this->idUsuario,
                "nombre"=> $this->nombre,
                "apellido"=> $this->apellido,
                "correo"=> $this->correo,
                "contrasenia"=> sha1($this->contrasenia)                
            );
            $archivo = fopen("../data/usuarios.json", "w");
            fwrite($archivo, json_encode($usuario));
            fclose($archivo);
        }
        public static function obtenerUsuarios(){
              $contenido = file_get_contents("../data/usuarios.json");
              echo $contenido;
        }
        
    

        public static function verificarUsuario($correo, $contrasenia){
            $contenido = file_get_contents("../data/usuarios.json");
            $usuarios = json_decode($contenido, true);
            for($i=0;$i<sizeof($usuarios); $i++){
                if($usuarios[$i]["correo"] == $correo && $usuarios[$i]["contrasenia"] == sha1($contrasenia)){
                    return $usuarios[$i];
                }
            }
            return null;
        }

     
      

           
    }
            

?>