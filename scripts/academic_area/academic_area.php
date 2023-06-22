<?php

class academic_area extends connect{
    private $queryPost = 'INSERT INTO academic_area(id, id_area, id_staff, id_position, id_journeys) VALUES (:identificador, :fk_area, :fk_staff, :fk_posicion, :fk_journeys)';
    private $queryGetAll = 'SELECT id AS "identificador", id_area AS "fk_area", id_staff AS "fk_staff", id_position AS "fk_posicion", id_journeys AS "fk_journeys" FROM academic_area';
    private $queryUpdate = 'UPDATE academic_area SET id_area = :fk_area, id_staff = :fk_staff, id_position = :fk_posicion, id_journeys = :fk_journeys WHERE id = :identificador';
    private $queryDelete = 'DELETE FROM academic_area WHERE id = :identificador';
    private $message;
    use getInstance;

    function __construct(private $id=1, private $id_area=1, private $id_staff=1, private $id_position=1, private $id_journeys=1){
        parent::__construct();
    }

    public function postAcademicArea(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("fk_area", $this->id_area);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("fk_posicion", $this->id_position);
            $res->bindValue("fk_journeys", $this->id_journeys);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAllAcademicArea(){
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
    public function updateAcademicArea(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("fk_area", $this->id_area);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("fk_posicion", $this->id_position);
            $res->bindValue("fk_journeys", $this->id_journeys);
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
    public function deleteAcademicArea(){
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
