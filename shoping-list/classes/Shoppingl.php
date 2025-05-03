<?php
//Create CRUD

class Shoppingl{

    private $conn;
    private $table="list";
    public $id;
    public $done;
    public $name;
    public $quantity;
    public $um;
    


    public function __construct($db){
        $this->conn=$db;
    }
    public function create(){
        $query="INSERT INTO " . $this->table. "(name, done, quantity,um) VALUES (?,?,?,?)";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("siis", $this->name,$this->done,$this->quantity,$this->um);

        return $stmt->execute();
        
    }


    public function read(){
        $query="SELECT * FROM ".$this->table." ORDER BY id";
        $result=$this->conn->query($query);
        return $result;
    }

    public function complete($id){
        $query="UPDATE ".$this->table." SET done=0 WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
    public function uncomplete($id){
        $query="UPDATE ".$this->table." SET done=1 WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function delete($id){
        $query="DELETE FROM ".$this->table." WHERE  id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
    public function deleteall(){
        $query="DELETE FROM ".$this->table;
        $stmt=$this->conn->prepare($query);
        return $stmt->execute();
    }

}

?>