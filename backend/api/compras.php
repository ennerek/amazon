<?php
session_start();
header("Content-Type: application/json");
include_once("../clases/clase-compra.php");
if (!isset($_SESSION["token"])) {
    echo '{"mensaje": "acceso no autorizado"}';
    exit;
}
if (!isset($_COOKIE["token"])) {
    echo '{"mensaje": "acceso no autorizado"}';
    exit;
}
if ($_SESSION["token"] != $_COOKIE["token"]) {
    echo '{"mensaje": "acceso no autorizado"}';
    exit;
}


switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        $compra = new Compra($_POST["idUsuario"], $_POST["idCategoria"], $_POST["nombreProducto"], $_POST["precio"], $_POST["descripcion"], $_POST["imagen"]);
        $compra->anadirCompra();
        $resultado["mensaje"] = "Guardar compra, informacion:" . json_encode($_POST);
        echo json_encode($resultado);
        break;
    case 'GET':
        if (isset($_GET['idUsuario'])) {
            Compra::obtenerCompra($_GET['idUsuario']);
        }
        break;
}
