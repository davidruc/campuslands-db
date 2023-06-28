<?php
namespace App;
class tutors extends connect{
    private $queryPost = 'INSERT INTO tutors(id, id_staff, id_academic_area, id_position) VALUES (:id, :fk_staff,:fk_academic_area ,:fk_position)';
    private $queryGetAll = 'SELECT tutors.id AS "id",
    tutors.id_staff AS "fk_staff",
    staff.first_name AS "f_name",
    staff.second_name AS "s_name", 
    tutors.id_academic_area AS "fk_academic_area",
    areas.name_area AS "fk_name_area",
    tutors.id_position AS "fk_position",
    position.name_position AS "fk_position_name"
    FROM tutors
    INNER JOIN staff ON tutors.id_staff = staff.id
    INNER JOIN areas ON  tutors.id_academic_area = areas.id
    INNER JOIN position ON tutors.id_position = position.id';
    private $queryGet = 'SELECT tutors.id AS "id",
    tutors.id_staff AS "fk_staff",
    staff.first_name AS "f_name",
    staff.second_name AS "s_name", 
    tutors.id_academic_area AS "fk_academic_area",
    areas.name_area AS "fk_name_area",
    tutors.id_position AS "fk_position",
    position.name_position AS "fk_position_name"
    FROM tutors
    INNER JOIN staff ON tutors.id_staff = staff.id
    INNER JOIN areas ON  tutors.id_academic_area = areas.id
    INNER JOIN position ON tutors.id_position = position.id 
    WHERE tutors.id=:id';
    private $queryUpdate = 'UPDATE tutors SET id_staff = :fk_staff, id_academic_area=:fk_academic_area, id_position=:fk_position WHERE id = :id';
    private $queryDelete = 'DELETE FROM tutors WHERE id = :id';
    use getInstance;
    private $message;
    function __construct(private $id =1, public $id_staff = 1, public $id_academic_area=1, public $id_position=1){
        parent::__construct();
    }

    public function post_tutors(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("fk_academic_area", $this->id_academic_area);
            $res->bindValue("fk_position", $this->id_position);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_tutors(){
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
    public function get_tutors($id){
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
    public function update_tutors(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("fk_academic_area", $this->id_academic_area);
            $res->bindValue("fk_position", $this->id_position);
            $res->execute();
            
            if ($res->rowCount() > 0){
                $this->message = ["Code" => 200, "Message" => "Data updated"];
            }
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        } finally {
            print_r(json_encode($this->message));
        }
    }
    public function delete_tutors(){
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
