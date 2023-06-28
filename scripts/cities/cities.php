<?php
namespace App;
class cities extends connect{ 
    private $queryPost = 'INSERT INTO cities(id, name_city, id_region) VALUES (:id, :city, :fk_region)';
    private $queryGetAll = 'SELECT cities.id AS "id",
    name_city AS "city",
    cities.id_region AS "fk_region",
    regions.name_region AS "name_region_fk"
    FROM cities
    INNER JOIN regions ON cities.id_region = regions.id';
    private $queryGet = 'SELECT cities.id AS "id",
    name_city AS "city",
    cities.id_region AS "fk_region",
    regions.name_region AS "name_region_fk"
    FROM cities
    INNER JOIN regions ON cities.id_region = regions.id 
    WHERE cities.id=:id';
    private $queryUpdate = 'UPDATE cities SET name_city= :city, id_region=:fk_region WHERE id=:id';
    private $queryDelete = 'DELETE FROM cities WHERE id=:id';
    use getInstance;
    private $message;

    function __construct(private $id=1, private $id_region=1, public $name_city=1){
        parent::__construct();
    }

    public function post_cities(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("city", $this->name_city);
            $res->bindValue("fk_region", $this->id_region);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_cities(){
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r(json_encode($this->message));        }
    }
    public function get_cities($id){
        try{
            $res = $this->conexion->prepare($this->queryGet);
            $res->bindParam("id", $id);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetch(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r(json_encode($this->message));
        }
    }
    public function update_cities(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("city", $this->name_city);
            $res->bindValue("fk_region", $this->id_region);
            $res->execute();
 
            if ($res->rowCount() > 0){
                $this->message = ["Code" => 200, "Message" => "Data updated"];
            }else {
                $this->message = ["Code" => 404, "Messege"=>"Data Not found"];
            }
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }

    }
    public function delete_cities (){
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
