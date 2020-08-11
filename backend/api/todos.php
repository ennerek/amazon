<?php 
    header("Content-Type: application/json");
    include_once("../clases/clase-todos.php");

    switch ($_SERVER['REQUEST_METHOD']) {
       case 'GET':            
                Todos::obtenerTodos();
               
        break;
    }

?>