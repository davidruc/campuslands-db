<?php
namespace App;
class marketing_area extends connect{
    private $queryPost = 'INSERT INTO marketing_area(id, id_area, id_staff, id_position, id_journey) VALUES (:identificador, :fk_area, :fk_staff, :fk_posicion, :fk_journeys)';
    private $queryGetAll = 'SELECT id AS "identificador", id_area AS "fk_area", id_staff AS "fk_staff", id_position AS "fk_posicion", id_journey AS "fk_journeys" FROM marketing_area';
    private $queryUpdate = 'UPDATE marketing_area SET id_area = :fk_area, id_staff = :fk_staff, id_position = :fk_posicion, id_journey = :fk_journeys WHERE id = :identificador';
    private $queryDelete = 'DELETE FROM marketing_area WHERE id = :identificador';
    use getInstance;
    private $message;

    function __construct(private $id=1, private $id_area=1, private $id_staff=1, private $id_position=1, private $id_journey=1 ){
        parent::__construct();
    }

    public function post_marketing_area(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("fk_area", $this->id_area);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("fk_posicion", $this->id_position);
            $res->bindValue("fk_journeys", $this->id_journey);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_marketing_area(){
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
    public function update_marketing_area(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("fk_area", $this->id_area);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("fk_posicion", $this->id_position);
            $res->bindValue("fk_journeys", $this->id_journey);
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
    public function delete_marketing_area(){
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
