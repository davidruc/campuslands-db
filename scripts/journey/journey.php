<?php
namespace App;
class journey extends connect{
    private $queryPost = 'INSERT INTO journey(id, name_journey, check_in, check_out) VALUES (:id, :journey_name,:check_in_hour ,:check_out_hour)';
    private $queryGetAll = 'SELECT id AS "id", name_journey AS "journey_name", check_in AS "check_in_hour", check_out AS "check_out_hour" FROM journey';
    private $queryGet = 'SELECT id AS "id", name_journey AS "journey_name", check_in AS "check_in_hour", check_out AS "check_out_hour" FROM journey WHERE id=:id';

    private $queryUpdate = 'UPDATE journey SET name_journey = :journey_name, check_in=:check_in_hour, check_out=:check_out_hour WHERE id = :id';
    private $queryDelete = 'DELETE FROM journey WHERE id = :id';
    use getInstance;
    private $message;
    function __construct(private $id =1, public $name_journey = 1, public $check_in=1, public $check_out=1){
        parent::__construct();
    }

    public function post_journey(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("journey_name", $this->name_journey);
            $res->bindValue("check_in_hour", $this->check_in);
            $res->bindValue("check_out_hour", $this->check_out);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_journey(){
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

    public function get_journey($id){
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
    public function update_journey(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("journey_name", $this->name_journey);
            $res->bindValue("check_in_hour", $this->check_in);
            $res->bindValue("check_out_hour", $this->check_out);
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
    public function delete_journey(){
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
