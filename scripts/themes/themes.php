<?php
namespace App;
class themes extends connect{ 
    private $queryPost = 'INSERT INTO themes(id, name_theme, start_date, end_date,description,id_chapter,duration_days) VALUES (:id, :theme_names, :start_D, :end_D, :description, :fk_chapter, :days_duration)';
    private $queryGetAll = 'SELECT id AS "id", name_theme AS "theme_names", start_date AS "start_D", end_date AS "end_D", description AS "description", id_chapter AS "fk_chapter", duration_days AS "days_duration" FROM themes';
    private $queryUpdate = 'UPDATE themes SET id=:id, name_theme=:theme_names, start_date=:start_D, end_date=:end_D, description=:description, id_chapter=:fk_chapter, duration_days=:days_duration WHERE id=:id';
    private $queryDelete = 'DELETE FROM themes WHERE id=:id';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_theme=1, public $start_date=1, public $end_date=1, public $description=1, private $id_chapter=1, public $duration_days=1 ){
        parent::__construct();
    }

    public function post_themes(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("theme_names", $this->name_theme);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("fk_chapter", $this->id_chapter);
            $res->bindValue("days_duration", $this->duration_days);
            
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_themes(){
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
    public function update_themes(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("theme_names", $this->name_theme);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("fk_chapter", $this->id_chapter);
            $res->bindValue("days_duration", $this->duration_days);
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
    public function delete_themes(){
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
