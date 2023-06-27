<?php
namespace App;
class emergency_contact extends connect{ 
    private $queryPost = 'INSERT INTO emergency_contact(id, cel_number, relationship,full_name, email, id_staff) VALUES  (:id, :phone, :relation, :complete_name, :email,:fk_staff)';
    private $queryGetAll = 'SELECT emergency_contact.id AS "id",
    emergency_contact.cel_number AS "phone",
    emergency_contact.relationship AS "relation",
    emergency_contact.full_name AS "complete_name",
    emergency_contact.email AS "email",
    emergency_contact.id_staff AS "fk_staff",
    staff.first_name AS "fk_first_name",
    staff.first_surname AS "fk_first_surname"
    FROM emergency_contact
    INNER JOIN staff ON emergency_contact.id_staff = staff.id';
    private $queryGet = 'SELECT emergency_contact.id AS "id",
    emergency_contact.cel_number AS "phone",
    emergency_contact.relationship AS "relation",
    emergency_contact.full_name AS "complete_name",
    emergency_contact.email AS "email",
    emergency_contact.id_staff AS "fk_staff",
    staff.first_name AS "fk_first_name",
    staff.first_surname AS "fk_first_surname"
    FROM emergency_contact
    INNER JOIN staff ON emergency_contact.id_staff = staff.id 
    WHERE emergency_contact.id=:id';
    private $queryUpdate = 'UPDATE emergency_contact SET cel_number=:phone, relationship=:relation, full_name=:complete_name, email=:email, id_staff=:fk_staff WHERE id=:id';
    private $queryDelete = 'DELETE FROM emergency_contact WHERE id=:id ';
    private $message;
    use getInstance;

    function __construct(private $id=1, private $cel_number=0, public $relationship=0, public $full_name=1, public $email=1,private $id_staff=1){
        parent::__construct();
    }

    public function post_emergency_contact(){
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

    public function get_emergency_contact($id){
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
    public function update_emergency_contact(){
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
    public function delete_emergency_contact(){
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
