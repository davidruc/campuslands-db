<?php
namespace App;
class contact_info extends connect{ 
    private $queryPost = 'INSERT INTO contact_info(id, whatsapp, instagram, linkedin, email, address, cel_number, id_staff) VALUES (:id, :contact, :ig, :li, :email, :direction, :phone, :fk_staff)';
    private $queryGetAll = 'SELECT contact_info.id AS "id",
    contact_info.whatsapp AS "contact",
    contact_info.instagram AS "ig",
    contact_info.linkedin AS "li",
    contact_info.email AS "email",
    contact_info.address AS "direction",
    contact_info.cel_number AS "phone",
    contact_info.id_staff AS "fk_staff",
    staff.first_name AS "fk_first_name",
    staff.first_surname AS "fk_first_surname"
    FROM contact_info
    INNER JOIN staff ON contact_info.id_staff = staff.id';
    private $queryGet = 'SELECT contact_info.id AS "id",
    contact_info.whatsapp AS "contact",
    contact_info.instagram AS "ig",
    contact_info.linkedin AS "li",
    contact_info.email AS "email",
    contact_info.address AS "direction",
    contact_info.cel_number AS "phone",
    contact_info.id_staff AS "fk_staff",
    staff.first_name AS "fk_first_name",
    staff.first_surname AS "fk_first_surname"
    FROM contact_info
    INNER JOIN staff ON contact_info.id_staff = staff.id WHERE contact_info.id=:id';

    private $queryUpdate = 'UPDATE contact_info SET  whatsapp =:contact, instagram =:ig, linkedin =:li, email =:email,  address =:direction, cel_number =:phone, id_staff =:fk_staff WHERE id=:id';
    private $queryDelete = 'DELETE FROM contact_info WHERE id=:id';
    private $message;
    use getInstance;

    function __construct(private $id=1, private $whatsapp=1, private $instagram=1, public $linkedin=1, public $email=1, private $address=1,private $cel_number=1, private $id_staff=1){
        parent::__construct();
    }

    public function post_contact_info(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("id", $this->id);
            $res->bindValue("contact", $this->whatsapp);
            $res->bindValue("ig", $this->instagram);
            $res->bindValue("li", $this->linkedin);
            $res->bindValue("email", $this->email);
            $res->bindValue("direction", $this->address);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("fk_staff", $this->id_staff);
            $res->execute();
            $this->message = ["Code" => 200 + $res->rowCount(), "Message"=>"inserted Data"];
        } catch (\PDOException $e){
            $this->message = ["Code" => $e->getCode(), "Message"=> $res->errorInfo()[2]];
        } finally {
            print_r($this->message);
        }
     
    }
    public function getAll_contact_info(){
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
    public function get_contact_info($id){
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
    public function update_contact_info(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("id", $this->id);
            $res->bindValue("contact", $this->whatsapp);
            $res->bindValue("ig", $this->instagram);
            $res->bindValue("li", $this->linkedin);
            $res->bindValue("email", $this->email);
            $res->bindValue("direction", $this->address);
            $res->bindValue("phone", $this->cel_number);
            $res->bindValue("fk_staff", $this->id_staff);
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
    public function delete_contact_info(){
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
