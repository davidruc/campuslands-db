<?php
//! Pequeña funciónes para detectar errores y saber en donde están.
error_reporting(E_ALL);
ini_set('display_error', "1");

trait getInstance{
    static $instance;
    static function getInstance(){
        $arg = func_get_args();
        $arg = array_pop($arg);
        if (self::$instance == null){
            self::$instance = new self(...(array) $arg);
        }
        return self::$instance;
    }
    function __set($name, $value){
        $this->name = $value;
    }
}

function autoload($class){
    $directories = array();     
    $directorio = dirname(__DIR__) . '/scripts';     
    $elementos = scandir($directorio);     
    foreach ($elementos as $elemento) {         
        $rutaElemento = $directorio . '/' . $elemento . '/';         
        if (is_dir($rutaElemento) && $elemento !== '.' && $elemento !== '..') {             
            $directories[] = $rutaElemento;         
        }     
    }
    $classFile = str_replace("\\","/", $class). ".php";

    foreach($directories as $directory){
        $file = $directory.$classFile;
        if (file_exists($file)){
            require $file;
            return;
        }
    }
}

spl_autoload_register("autoload");

areas::getInstance(json_decode(file_get_contents("php://input"), true))->getAllAreas();
?>
