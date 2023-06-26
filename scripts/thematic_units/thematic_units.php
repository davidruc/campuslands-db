<?php
namespace App;
class thematic_units extends connect{ 
    private $queryPost = 'INSERT INTO thematic_units(id, name_thematics_units, start_date, end_date,description, duration_days, id_route) VALUES (:id, :thematics_units, :start_D, :end_D, :description, :duration_in_months, :fk_route)';
    private $queryGetAll = 'SELECT id AS "id", name_thematics_units AS "thematics_units",  start_date AS "Start_date", end_date AS "End_date",  description AS "details", duration_days AS "duration", id_route AS fk_route FROM thematic_units';
    private $queryUpdate = 'UPDATE thematic_units SET id=:id, name_thematics_units=:thematics_units, start_date=:start_D, end_date=:end_D, description=:description, duration_days=:duration_in_months, id_route=:fk_route WHERE id=:id';
    private $queryDelete = 'DELETE FROM thematic_units WHERE id=:id';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_thematics_units=1, public $start_date=1, public $end_date=1, public $description=1, public $duration_days=1, private $id_route=1 ){
        parent::__construct();
    }

    public function post_thematic_units(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("thematics_units", $this->name_thematics_units);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("duration_in_months", $this->duration_days);
            $res->bindValue("fk_route", $this->id_route);
            
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_thematic_units(){
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
    public function update_thematic_units(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("thematics_units", $this->name_thematics_units);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("duration_in_months", $this->duration_days);
            $res->bindValue("fk_route", $this->id_route);
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
    public function delete_thematic_units(){
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
