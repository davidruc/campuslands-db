<?php
//! Pequeña funciónes para detectar errores y saber en donde están.
error_reporting(E_ALL);
ini_set('display_error', "1");

header("Content-Type: application/json");
require_once "../vendor/autoload.php";
$router = new \Bramus\Router\Router();



$router->get("/get/{tabla}", function($tabla) {
    $class = "App\\" .$tabla;
    $method = "getAll_" . $tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method();
});

$router->post("/{tabla}/{id}", function ($tabla, $id) {
    $class = "App\\" . $tabla;
    $method = "get_" . $tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method($id);
});

$router->post("/{tabla}", function($tabla){
    $class = "App\\" .$tabla;
    $method = "post_" .$tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method();
});

$router->put("/{tabla}/{id}", function($tabla, $id){
    $class = "App\\" .$tabla;
    $method = "update_" .$tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method($id);
});

$router->delete("/{tabla}/{id}", function($tabla, $id){
    $class = "App\\" . $tabla;
    $method = "delete_".$tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method($id);
});

$router->run();
?>
