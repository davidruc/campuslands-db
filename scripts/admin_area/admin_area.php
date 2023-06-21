<?php

class admin_area extends connect{ //cambiar nombre de la clase
    private $queryPost = '';
    private $queryGetAll = '';
    private $queryUpdate = '';
    private $queryDelete = '';
    private $message;
    use getInstance;

    function __construct(){//faltan los parámetros del constructor
        parent::__construct();
    }

    public function post (){ //completar nombres
        try{
            $res = $this->conexion->prepare($this->queryPost);
            //res-> faltantes
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll (){ //completar nombres
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }
    public function update (){//cambiar el nombre
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            //res-> faltantes
            $res->execute();
 
            if ($res->rowCount() > 0){
                $this->message = ["Code" => 200, "Message" => "Data updated"];
            }
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }

    }
    public function delete (){ //nombre
        try{
            $res = $this->conexion->prepare($this->queryDelete);
            //res 
            $res-> execute();
            $this->message = ["Code" => 200, "Message" => "Data delete"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }


}



?>
