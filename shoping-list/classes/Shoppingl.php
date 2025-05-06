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
//add data
    public function create(){
        $query="INSERT INTO " . $this->table. "(name, done, quantity,um) VALUES (?,?,?,?)";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("siis", $this->name,$this->done,$this->quantity,$this->um);

        return $stmt->execute();
      
        
    }
//update
    public function updatename($id){
        $query="UPDATE ".$this->table." SET  name=? WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("si",$this->name, $id);

        return $stmt->execute();
    }public function updatequantity($id){
        $query="UPDATE ".$this->table." SET  quantity=? WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("ii",$this->quantity, $id);

        return $stmt->execute();
    }public function updateum($id){
        $query="UPDATE ".$this->table." SET  um=? WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("si",$this->um, $id);

        return $stmt->execute();
    }
//read
    public function read(){
        $query="SELECT * FROM ".$this->table." ORDER BY id";
        $result=$this->conn->query($query);
        return $result;
    }

//done
    public function complete($id){
        $query="UPDATE ".$this->table." SET done=0 WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        
        return $stmt->execute();
    }

//not done
    public function uncomplete($id){
        $query="UPDATE ".$this->table." SET done=1 WHERE id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
//delete item
    public function delete($id){
        $query="DELETE FROM ".$this->table." WHERE  id=?";
        $stmt=$this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

//delete all
    public function deleteall(){
        $query="DELETE FROM ".$this->table;
        $stmt=$this->conn->prepare($query);
        return $stmt->execute();
    }
   
}

?>