<?php
namespace App;
class working_info extends connect{ 
    private $queryPost = 'INSERT INTO working_info(id, id_staff, years_exp,months_exp,id_work_reference,id_personal_ref,start_contract,end_contract) VALUES (:id, :fk_staff, :experience_Y, :experience_M, :fk_work_reference, :fk_personal_ref, :start_contract, :end_contract)';
    private $queryGetAll = 'SELECT id AS "id", id_staff AS "fk_staff", years_exp AS "experience_Y", months_exp AS "experience_M" , id_work_reference AS "fk_work_reference" , id_personal_ref AS "fk_personal_ref", start_contract AS "start_contract", end_contract AS "end_contract" FROM working_info';
    private $queryUpdate = 'UPDATE working_info SET id_staff=:fk_staff, years_exp =:experience_Y, months_exp=:experience_M, id_work_reference=:fk_work_reference,id_personal_ref=:fk_personal_ref, start_contract=:start_contract, end_contract=:end_contract WHERE id=":id"';
    private $queryDelete = 'DELETE FROM working_info WHERE id= :id';
    use getInstance;
    private $message;

    function __construct(private $id =1, private $id_staff=1, public $years_exp=1, public $months_exp=1, private $id_work_reference=1,private $id_personal_ref=1, public $start_contract=1, public $end_contract=1){
        parent::__construct();
    }

    public function postWorkingInfo(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("experience_Y", $this->years_exp);
            $res->bindValue("experience_M", $this->months_exp);
            $res->bindValue("fk_work_reference", $this->id_work_reference);
            $res->bindValue("fk_personal_ref", $this->id_personal_ref);
            $res->bindValue("start_contract", $this->start_contract);
            $res->bindValue("end_contract", $this->end_contract);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_working_info(){
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
    public function updateWorkingInfo(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->bindValue("experience_Y", $this->years_exp);
            $res->bindValue("experience_M", $this->months_exp);
            $res->bindValue("fk_work_reference", $this->id_work_reference);
            $res->bindValue("fk_personal_ref", $this->id_personal_ref);
            $res->bindValue("start_contract", $this->start_contract);
            $res->bindValue("end_contract", $this->end_contract);
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
    public function deleteWorkingInfo(){
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
