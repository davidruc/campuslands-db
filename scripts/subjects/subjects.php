<?php
namespace App;

class subjects extends connect{
    private $queryPost = 'INSERT INTO subjects(id, name_subject) VALUES (:id, :subject_name)';
    private $queryGetAll = 'SELECT id AS "id", name_subject AS "subject_name" FROM subjects';
    private $queryUpdate = 'UPDATE subjects SET name_subject = :subject_name WHERE id = :id';
    private $queryDelete = 'DELETE FROM subjects WHERE id = :id';
    use getInstance;
    private $message;
    function __construct(private $id =1, public $name_subject = 1){
        parent::__construct();
    }

    public function post_subjects(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("subject_name", $this->name_subject);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
    }
    public function getAll_subjects(){
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
    public function update_subjects(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("subject_name", $this->name_subject);
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
    public function delete_subjects(){
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
