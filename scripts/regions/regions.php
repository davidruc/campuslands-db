<?php

class regions extends connect{ 
    private $queryPost = 'INSERT INTO regions(id, name_region, id_country) VALUES (:id, :region, :fk_country)';
    private $queryGetAll = 'SELECT id AS "id", name_region AS "region", id_country AS "fk_country" FROM regions';
    private $queryUpdate = 'UPDATE regions SET name_region= :region, id_country=:fk_country WHERE id=:id';
    private $queryDelete = 'DELETE FROM countries WHERE id= :id';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_region=1, private $id_country=1){
        parent::__construct();
    }

    public function postRegions (){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("region", $this->name_region);
            $res->bindValue("fk_country", $this->id_country);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAllRegions (){
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
    public function updateRegions (){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("region", $this->name_region);
            $res->bindValue("fk_country", $this->id_country);
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
    public function deleteRegions (){
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
