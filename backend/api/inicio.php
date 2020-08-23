<?php 
    session_start();
    
    header("Content-Type: application/json");
    include_once("../clases/clase-usuario.php");
    $_POST = json_decode(file_get_contents('php://input'), true);   
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':            
           $usuario = Usuario::verificarUsuario($_POST['correo'], $_POST['contrasenia']);
           if($usuario){
                //echo '{"codigoResultado":1, "mensaje":"Autenticado"}';
                
                $resultado = array(
                       "codigoResultado"=>1,
                       "mensaje"=> "usuario autenticado",
                       "token"=>sha1(uniqid(rand(),true))
                );
                $_SESSION["token"] = $resultado["token"];
                setcookie("token", $resultado["token"],time()+(60*60*24*31),"/");
                setcookie("idUsuario", $usuario["idUsuario"], time()+(60*60*24*31), "/");
                setcookie("nombre", $usuario["nombre"], time()+(60*60*24*31), "/");
                setcookie("apellido", $usuario["apellido"], time()+(60*60*24*31), "/");
                echo json_encode($resultado);

           }else{
               
                setcookie("token"," ",time()-1);
                setcookie("idUsuario"," " ,time()-1);
                setcookie("nombre"," " , time()-1);
                setcookie("apellido"," " , time()-1);
               echo '{"codigoResultado":0, "mensaje":"correo o contraseña incorreto"}';
            }
            break;
        ;
    }

?>