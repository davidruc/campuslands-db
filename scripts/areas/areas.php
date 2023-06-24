<?php
namespace App;

class areas extends connect{
    private $queryPost = 'INSERT INTO areas(id, name_area) VALUES (:identificador, :nombre_area)';
    private $queryGetAll = 'SELECT id AS "identificador", name_area AS "nombre_area" FROM areas';
    private $queryUpdate = 'UPDATE areas SET name_area = :nombre_area WHERE id = :identificador';
    private $queryDelete = 'DELETE FROM areas WHERE id = :identificador';
    use getInstance;
    private $message;
    function __construct(private $id = 1, public $name_area = 1){
        parent::__construct();
    }

    public function postArea(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("nombre_area", $this->name_area);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_areas(){
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }
    public function updateArea(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("nombre_area", $this->name_area);
            $res->execute();
            //! Hace falta revisar la validación
            if ($res->rowCount() > 0){
                $this->message = ["Code" => 200, "Message" => "Data updated"];
            }
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function deleteArea(){
        try{
            $res = $this->conexion->prepare($this->queryDelete);
            $res->bindValue("identificador", $this->id);
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
