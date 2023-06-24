<?php
namespace App;
class work_reference extends connect{ 
    private $queryPost = 'INSERT INTO work_reference(id, full_name, cel_number, position, company) VALUES (:id, :complete_name, :phone, :possition, :workPlace)';
    private $queryGetAll = 'SELECT id AS "id", full_name AS "complete_name", cel_number AS "phone", position AS "possition" ,company AS "workPlace" FROM work_reference';
    private $queryUpdate = 'UPDATE work_reference SET full_name = :complete_name, cel_number= :phone, position = :possition, company = :workPlace WHERE id = :id';
    private $queryDelete = 'DELETE FROM work_reference WHERE id = :id';
    private $message;
    use getInstance; 

    function __construct(private $id=1, public $full_name=1, private $cel_number=1, public $position=1, public $company=1){
        parent::__construct();
    }

    public function postWorkReference(){ 
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("complete_name", $this->full_name);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("possition", $this->position);
            $res->bindValue("workPlace", $this->company);
           
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_work_reference(){
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
    public function updateWorkReference (){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("complete_name", $this->full_name);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("possition", $this->position);
            $res->bindValue("workPlace", $this->company);
            $res->execute();
 
            if ($res->rowCount() > 0){
                $this->message = ["Code" => 200, "Message" => "Data updated"];
            } else {
                $this->message = ["Code" => 404, "Messege"=>"Data Not found"];
            }
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }

    }
    public function deleteWorkReference (){ 
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
