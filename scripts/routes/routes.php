<?php
namespace App;
class routes extends connect{ 
    private $queryPost = 'INSERT INTO routes(id, name_route, start_date, end_date,description,duration_month) VALUES (:id, :route_name, :start_D, :end_D, :description, :duration_in_months)';
    private $queryGetAll = 'SELECT id AS "id", name_route AS "route_name",  start_date AS "Start_date", end_date AS "End_date",  description AS "details", duration_month AS "duration"  FROM routes';
    private $queryGet = 'SELECT id AS "id", name_route AS "route_name",  start_date AS "Start_date", end_date AS "End_date",  description AS "details", duration_month AS "duration"  FROM routes WHERE id=:id';

    private $queryUpdate = 'UPDATE routes SET id=:id, name_route=:route_name, start_date=:start_D, end_date=:end_D, description=:description, duration_month=:duration_in_months WHERE id=:id';
    private $queryDelete = 'DELETE FROM routes WHERE id=:id';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_route=1, public $start_date=1, public $end_date=1, public $description=1, public $duration_month=1 ){
        parent::__construct();
    }

    public function post_routes(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("route_name", $this->name_route);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("duration_in_months", $this->duration_month);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }

    public function get_routes($id){
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
    public function getAll_routes(){
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
    public function update_routes(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("route_name", $this->name_route);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("duration_in_months", $this->duration_month);
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
    public function delete_routes(){
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
