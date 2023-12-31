<?php
namespace App;
class regions extends connect{ 
    private $queryPost = 'INSERT INTO regions(id, name_region, id_country) VALUES (:id, :region, :fk_country)';
    private $queryGetAll = 'SELECT regions.id AS "id",
    regions.name_region AS "region",
    regions.id_country AS "fk_country",
    countries.name_country AS "country_name_fk"
    FROM regions
    INNER JOIN countries ON regions.id_country = countries.id;';
    private $queryGet = 'SELECT regions.id AS "id",
    regions.name_region AS "region",
    regions.id_country AS "fk_country",
    countries.name_country AS "country_name_fk"
    FROM regions
    INNER JOIN countries ON regions.id_country = countries.id
    WHERE regions.id=:id';
    private $queryUpdate = 'UPDATE regions SET name_region= :region, id_country=:fk_country WHERE id=:id';
    private $queryDelete = 'DELETE FROM regions WHERE id= :id';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_region=1, private $id_country=1){
        parent::__construct();
    }

    public function post_regions (){
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
    public function getAll_regions (){
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r(json_encode($this->message));
        }
    }

    public function get_regions($id){
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
    public function update_regions (){
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
    public function delete_regions (){
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
