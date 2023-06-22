<?php

class cities extends connect{ 
    private $queryPost = 'INSERT INTO cities(id, name_city, id_region) VALUES (:id, :city, :fk_region)';
    private $queryGetAll = 'SELECT id AS "id", name_city AS "city", id_region AS "fk_region" FROM cities';
    private $queryUpdate = 'UPDATE cities SET name_city= :city, id_region=:fk_region WHERE id=:id';
    private $queryDelete = 'DELETE FROM cities WHERE id= :id';
    private $message;
    use getInstance;

    function __construct(private $id, private $id_region=1, public $name_city=1){
        parent::__construct();
    }

    public function postCountries (){
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
    public function getAllCountries (){
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
    public function updateCountries (){
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
    public function deleteCountries (){
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
