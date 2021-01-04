<?php
class Database{
    var $host = "localhost";
    var $uname = "admin";
    var $password = "admin";
    var $db = "pbo";
    var $conn;

    public function __construct (){
        $conn = mysqli_connect($this->host, $this->uname, $this->password, $this->db);
        $this->conn = $conn;
    }
}
?>