<?php
//! Pequeña funciónes para detectar errores y saber en donde están.
error_reporting(E_ALL);
ini_set('display_error', "1");


require_once "../vendor/autoload.php";
$router = new \Bramus\Router\Router();


$router->get("/admin_areas", function(){
    App\admin_area::getInstance(json_decode(file_get_contents("php://input"), true))->getAllAdminArea();
});

$router->get("/areas", function(){
    App\areas::getInstance(json_decode(file_get_contents("php://input"), true))->getAllAreas();
});



$router->get("/modulos", function(){
    App\modules::getInstance(json_decode(file_get_contents("php://input"), true))->getAllModules();

});

$router->run();
?>
