<?php
namespace App;

class levels extends connect{
    private $queryPost = 'INSERT INTO levels(id, name_level, group_level) VALUES (:id, :level_name, :level_group)';
    private $queryGetAll = 'SELECT id AS "id", name_level AS "level_name", group_level AS "level_group" FROM levels';
    private $queryGet = 'SELECT id AS "id", name_level AS "level_name", group_level AS "level_group" FROM levels WHERE id=:id';

    private $queryUpdate = 'UPDATE levels SET name_level = :level_name, group_level=:level_group WHERE id = :id';
    private $queryDelete = 'DELETE FROM levels WHERE id = :id';
    use getInstance;
    private $message;
    function __construct(private $id =1, public $name_level = 1, public $group_level =1){
        parent::__construct();
    }

    public function post_levels(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("level_name", $this->name_level);
             $res->bindValue("level_group", $this->group_level);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_levels(){
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
    public function get_levels($id){
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
    public function update_levels(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("level_name", $this->name_level);
             $res->bindValue("level_group", $this->group_level);
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
    public function delete_levels(){
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
