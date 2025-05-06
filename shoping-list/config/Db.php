<?php 

class Db{
    private $db_host='localhost';
    private $db_user='root';
    private $db_password='';
    private $db_name='shoping_list';

    public $conn;

    public function connect(){
        $this->conn=null;

        try {
            //connect to the database
            $this->conn=new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
            echo 'connect<br>';

            //connect error
            if($this->conn->connect_error){
                die("Connection failed".$this->conn->connect_error);
            }

        } catch (Exception $error) {
            //error to connect
            echo "connection Error".$error->getMessage();
        }

        return $this->conn;
    }
}

?>

