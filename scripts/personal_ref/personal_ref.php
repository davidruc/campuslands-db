<?php

class personal_ref extends connect{ //cambiar nombre de la clase
    private $queryPost = 'INSERT INTO personal_ref(id, full_name, cel_number, relationship, occupation) VALUES (:identificador, :complete_name, :phone, :civil_state, :ocupation)';
    private $queryGetAll = 'SELECT id AS "identificador", full_name AS "complete_name", cel_number AS "phone",  relationship AS "civil_state",  occupation AS "ocupation" FROM personal_ref';
    private $queryUpdate = 'UPDATE personal_ref SET full_name = :complete_name, cel_number = :phone, relationship = :civil_state, occupation = :ocupation WHERE id = :identificador';
    private $queryDelete = 'DELETE FROM personal_ref WHERE id = :identificador';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $full_name=1, private $cel_number=1, private $relationship =1, public $occupation=1){
        parent::__construct();
    }

    public function postPersonalRef (){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("complete_name", $this->full_name);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("civil_state", $this->relationship);
            $res->bindValue("ocupation", $this->occupation);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAllPersonalRef (){ 
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
    public function updatePersonalRef (){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("complete_name", $this->full_name);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("civil_state", $this->relationship);
            $res->bindValue("ocupation", $this->occupation);
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
    public function deletePersonalRef (){ 
        try{
            $res = $this->conexion->prepare($this->queryDelete);
            $res->bindValue("identificador", $this->id);
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
