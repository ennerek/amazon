<?php

header("Content-Type: application/json");
include_once("../clases/clase-todos.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $todo = new Todos($_POST["idUsuario"], $_POST["idCategoria"], $_POST["nombreProducto"], $_POST["precio"], $_POST["descripcion"], $_POST["imagen"]);
        $todo->guardarTodo();
        $resultado["mensaje"] = "todos los productos, informacion:" . json_encode($_POST);
        echo json_encode($resultado);
        break;
    case 'GET':
        Todos::obtenerTodos();
        break;
}
