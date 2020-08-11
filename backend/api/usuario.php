<?php 
    
    header("Content-Type: application/json");
    include_once("../clases/clase-usuario.php");

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'), true);
            $usuario = new Usuario($_POST["idUsuario"], $_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["contrasenia"]);
            $usuario->guardarUsuario();
            $resultado["mensaje"] = "Guardar usuario, informacion:". json_encode($_POST);
            echo json_encode($resultado);
        break;
        case 'GET':
            if(isset($_GET['$idUsuario'])){
               $resultado["mensaje"] = "Retornar el usuario con el id: " . $_GET($idUsuario);
               echo json_encode($resultado);
           }else{
                Usuario::obtenerUsuarios();
            }   
        break;
    }

?>