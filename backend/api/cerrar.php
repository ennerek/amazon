<?php  
     session_start();
     session_destroy();


    setcookie("token"," ",time()-1);
    setcookie("idUsuario"," " ,time()-1);
    setcookie("nombre"," " , time()-1);
    setcookie("apellido"," " , time()-1);

    header("Location: ../../amazon/frontend/index-usuario.php")





?>