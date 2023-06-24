<?php
namespace App;
class emergency_contact extends connect{ 
    private $queryPost = 'INSERT INTO emergency_contact(id, cel_number, relationship,full_name, email, id_staff) VALUES  (:id, :phone, :relation, :complete_name, :email,:fk_staff)';
    private $queryGetAll = 'SELECT id AS "id", cel_number AS "phone", relationship AS "relation", full_name AS "complete_name", email AS "email", id_staff AS "fk_staff" FROM emergency_contact';
    private $queryUpdate = 'UPDATE emergency_contact SET cel_number=:phone, relationship=:relation, full_name=:complete_name, email=:email, id_staff=:fk_staff WHERE id=:id';
    private $queryDelete = 'DELETE FROM emergency_contact WHERE id=:id ';
    private $message;
    use getInstance;

    function __construct(private $id=1, private $cel_number=0, public $relationship=0, public $full_name=1, public $email=1,private $id_staff=1){
        parent::__construct();
    }

    public function postEmergencyContanct(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("relation", $this->relationship);
            $res->bindValue("complete_name", $this->full_name);
            $res->bindValue("email", $this->email);
            $res->bindValue("fk_staff", $this->id_staff);
            
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_emergency_contact(){
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
    public function updateEmergencyContanct(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("relation", $this->relationship);
            $res->bindValue("complete_name", $this->full_name);
            $res->bindValue("email", $this->email);
            $res->bindValue("fk_staff", $this->id_staff);
            
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
    public function deleteEmergencyContanct(){
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
