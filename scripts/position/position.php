<?php
namespace App;

class position extends connect{
    private $queryPost = 'INSERT INTO `position`(id, name_position, arl) VALUES (:id, :position_name, :ARL)';
    private $queryGetAll = 'SELECT id AS "id", name_position AS "position_name", arl AS "ARL" FROM position';
    private $queryGet = 'SELECT id AS "id", name_position AS "position_name", arl AS "ARL" FROM position WHERE id=:id';
    private $queryUpdate = 'UPDATE `position` SET name_position = :position_name, arl=:ARL WHERE id = :id';
    private $queryDelete = 'DELETE FROM position WHERE id = :id';
    use getInstance;
    private $message;
    function __construct(private $id =1, public $name_position = 1, public $arl =1){
        parent::__construct();
    }

    public function post_position(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("position_name", $this->name_position);
            $res->bindValue("ARL", $this->arl);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_position(){
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
    public function get_position($id){
        try{
            $res = $this->conexion->prepare($this->queryGet);
            $res->bindParam("id", $id);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetch(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }
    public function update_position(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("position_name", $this->name_position);
             $res->bindValue("ARL", $this->arl);
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
    public function delete_position(){
        try{
            $res = $this->conexion->prepare($this->queryDelete);
            $res->bindValue("id", $this->id);
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
