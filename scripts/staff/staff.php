<?php
namespace App;
class staff extends connect{ 
    private $queryPost = 'INSERT INTO staff(id, doc, first_name,second_name,first_surname,second_surname,eps,id_area,id_city) VALUES (:id, :documento, :f_name, :s_name, :f_surname, :s_surname, :eps, :fk_area, :fk_city)';
    private $queryGetAll = 'SELECT id AS "id", doc AS "documento", first_name AS "f_name", second_name AS "s_name" , first_surname AS "f_surname" , second_surname AS "s_surname", eps AS "eps", id_area AS "fk_area", id_city AS "fk_city" FROM staff';
    private $queryUpdate = 'UPDATE staff SET doc=:documento, first_name =:f_name, second_name=:s_name, first_surname=:f_surname,second_surname=:s_surname, eps=:eps, id_area=:fk_area, id_city=:fk_city WHERE id=:id';
    private $queryDelete = 'DELETE FROM staff WHERE id= :id';
    private $message;
    use getInstance;

    function __construct(private $id=1, private $doc=1, public $first_name=1, public $second_name=1, public $first_surname=1, public $second_surname=1, public $eps=1, private $id_area=1, private $id_city =1 ){
        parent::__construct();
    }

    public function postStaff (){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("documento", $this->doc);
            $res->bindValue("f_name", $this->first_name);
            $res->bindValue("s_name", $this->second_name);
            $res->bindValue("f_surname", $this->first_surname);
            $res->bindValue("s_surname", $this->second_surname);
            $res->bindValue("eps", $this->eps);
            $res->bindValue("fk_area", $this->id_area);
            $res->bindValue("fk_city", $this->id_city);
            
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAllStaff (){
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
    public function updateStaff (){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("documento", $this->doc);
            $res->bindValue("f_name", $this->first_name);
            $res->bindValue("s_name", $this->second_name);
            $res->bindValue("f_surname", $this->first_surname);
            $res->bindValue("s_surname", $this->second_surname);
            $res->bindValue("eps", $this->eps);
            $res->bindValue("fk_area", $this->id_area);
            $res->bindValue("fk_city", $this->id_city);
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
    public function deleteStaff (){
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
