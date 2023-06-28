<?php
namespace App;
class chapters extends connect{ 
    private $queryPost = 'INSERT INTO chapters(id, name_chapter, start_date, end_date,description, duration_days, id_thematic_units) VALUES (:id, :chapter_name, :start_D, :end_D, :description, :duration_in_months, :fk_thematic_units)';
    private $queryGetAll = 'SELECT chapters.id AS "id",
    chapters.name_chapter AS "chapter_name",
    chapters.start_date AS "Start_date",
    chapters.end_date AS "End_date",
    chapters.description AS "details",
    chapters.duration_days AS "duration",
    chapters.id_thematic_units AS "fk_thematic_units",
    thematic_units.name_thematics_units AS "fk_name_thematics_units"
    FROM chapters 
    INNER JOIN thematic_units ON chapters.id_thematic_units = thematic_units.id;';
    private $queryGet = 'SELECT chapters.id AS "id",
    chapters.name_chapter AS "chapter_name",
    chapters.start_date AS "Start_date",
    chapters.end_date AS "End_date",
    chapters.description AS "details",
    chapters.duration_days AS "duration",
    chapters.id_thematic_units AS "fk_thematic_units",
    thematic_units.name_thematics_units AS "fk_name_thematics_units"
    FROM chapters 
    INNER JOIN thematic_units ON chapters.id_thematic_units = thematic_units.id;
    WHERE chapters.id=:id';

    private $queryUpdate = 'UPDATE chapters SET id=:id, name_chapter=:chapter_name, start_date=:start_D, end_date=:end_D, description=:description, duration_days=:duration_in_months, id_thematic_units=:fk_thematic_units WHERE id=:id';
    private $queryDelete = 'DELETE FROM chapters WHERE id=:id';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_chapter=1, public $start_date=1, public $end_date=1, public $description=1, public $duration_days=1, private $id_thematic_units=1 ){
        parent::__construct();
    }

    public function post_chapters(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("chapter_name", $this->name_chapter);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("duration_in_months", $this->duration_days);
            $res->bindValue("fk_thematic_units", $this->id_thematic_units);
            
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_chapters(){
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r(json_encode($this->message));
        }
    }
    public function get_chapters($id){
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
    public function update_chapters(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("chapter_name", $this->name_chapter);
            $res->bindValue("start_D", $this->start_date);
            $res->bindValue("end_D", $this->end_date);
            $res->bindValue("description", $this->description);
            $res->bindValue("duration_in_months", $this->duration_days);
            $res->bindValue("fk_thematic_units", $this->id_thematic_units);
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
    public function delete_chapters(){
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
