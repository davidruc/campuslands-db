<?php
namespace App;
class modules extends connect{ 
    private $queryPost = 'INSERT INTO modules(id, name_module, start_date, end_date, description,duration_days,id_theme) VALUES (:identificador, :module_name, :date_start, :date_end, :details,:days_duration, :fk_theme)';
    private $queryGetAll = 'SELECT modules.id AS "identificador",
    modules.name_module AS "module_name",
    modules.start_date AS "date_start",
    modules.end_date AS "date_end",
    modules.description AS "details",
    modules.duration_days AS "days_duration",
    modules.id_theme AS "fk_theme",
    themes.name_theme AS "fk_name_theme"
    FROM modules
    INNER JOIN themes ON modules.id_theme = themes.id';
    private $queryGet = 'SELECT modules.id AS "identificador",
    modules.name_module AS "module_name",
    modules.start_date AS "date_start",
    modules.end_date AS "date_end",
    modules.description AS "details",
    modules.duration_days AS "days_duration",
    modules.id_theme AS "fk_theme",
    themes.name_theme AS "fk_name_theme"
    FROM modules
    INNER JOIN themes ON modules.id_theme = themes.id 
    WHERE modules.id=:identificador';

    private $queryUpdate = 'UPDATE modules SET name_module = :module_name, start_date = :date_start, end_date = :date_end, description = :details, duration_days=:days_duration, id_theme=:fk_theme WHERE id = :identificador';
    private $queryDelete = 'DELETE FROM modules WHERE id = :identificador';
    use getInstance;
    private $message;

    function __construct(private $id=1, public $name_module=1, private $start_date=1, private $end_date =1, public $description=1, public $duration_days=1, private $id_theme=1 ){
        parent::__construct();
    }

    public function post_modules(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("module_name", $this->name_module);
            $res->bindValue("date_start", $this->start_date);
            $res->bindValue("date_end", $this->end_date);
            $res->bindValue("details", $this->description);
            $res->bindValue("days_duration", $this->duration_days);
            $res->bindValue("fk_theme", $this->id_theme);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_modules(){ 
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
    public function get_modules($id){
        try{
            $res = $this->conexion->prepare($this->queryGet);
            $res->bindParam("identificador", $id);
            $res->execute();
            $this->message = ["Code" => 200, "Message" => $res->fetch(\PDO::FETCH_ASSOC)];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r(json_encode($this->message));
        }
    }
    public function update_modules (){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("identificador", $this->id);
            $res->bindValue("module_name", $this->name_module);
            $res->bindValue("date_start", $this->start_date);
            $res->bindValue("date_end", $this->end_date);
            $res->bindValue("details", $this->description);
            $res->bindValue("days_duration", $this->duration_days);
            $res->bindValue("fk_theme", $this->id_theme);
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
    public function delete_modules (){ 
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
