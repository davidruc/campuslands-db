<?php
namespace App;

class locations extends connect{
    private $queryPost = 'INSERT INTO locations(id, name_location) VALUES (:id, :location_name)';
    private $queryGetAll = 'SELECT id AS "id", name_location AS "location_name" FROM locations';
    private $queryGet = 'SELECT id AS "id", name_location AS "location_name" FROM locations WHERE id=:id';

    private $queryUpdate = 'UPDATE locations SET name_location = :location_name WHERE id = :id';
    private $queryDelete = 'DELETE FROM locations WHERE id = :id';
    use getInstance;
    private $message;
    function __construct(private $id =1, public $name_location = 1){
        parent::__construct();
    }

    public function post_locations(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("location_name", $this->name_location);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_locations(){
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

    public function get_locations($id){
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
    public function update_locations(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("location_name", $this->name_location);
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
    public function delete_locations(){
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
