<?php
namespace App;
class topics extends connect{ 
    private $queryPost = 'INSERT INTO topics(id, name_topic, start_date, end_date, description,duration_days,id_module) VALUES (:identificador, :topic_name, :date_start, :date_end, :details,:days_duration, :fk_module)';
    private $queryGetAll = 'SELECT id AS "identificador", name_topic AS "topic_name", start_date AS "date_start",  end_date AS "date_end",  description AS "details",duration_days AS "days_duration", id_module AS "fk_module" FROM topics';
    private $queryUpdate = 'UPDATE topics SET name_topic = :topic_name, start_date = :date_start, end_date = :date_end, description = :details, duration_days=:days_duration, id_module=:fk_module WHERE id = :identificador';
    private $queryDelete = 'DELETE FROM topics WHERE id = :identificador';
    private $message;
    use getInstance;

    function __construct(private $id=1, public $name_topic=1, private $start_date=1, private $end_date =1, public $description=1, public $duration_days=1, private $id_module=1 ){
        parent::__construct();
    }

    public function post_topics(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("topic_name", $this->name_topic);
            $res->bindValue("date_start", $this->start_date);
            $res->bindValue("date_end", $this->end_date);
            $res->bindValue("details", $this->description);
            $res->bindValue("days_duration", $this->duration_days);
            $res->bindValue("fk_module", $this->id_module);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_topics(){ 
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetchAll(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
            print_r($conexion = null);
        }   finally {
            print_r($this->message);
        }
    }
    public function update_topics(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("topic_name", $this->name_topic);
            $res->bindValue("date_start", $this->start_date);
            $res->bindValue("date_end", $this->end_date);
            $res->bindValue("details", $this->description);
            $res->bindValue("days_duration", $this->duration_days);
            $res->bindValue("fk_module", $this->id_module);
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
    public function delete_topics(){ 
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
