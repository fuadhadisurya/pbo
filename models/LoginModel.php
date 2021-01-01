<?php
include '../config/Database.php';

class loginModel extends Database{
    function __construct (){
        parent::__construct();
    }

    function cekLogin($username, $password){
        $data = mysqli_query($this->conn,"SELECT * FROM user WHERE username='$username'");
        $cek = mysqli_fetch_assoc($data);

        if(password_verify($_POST['password'], $cek['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location:../dashboard.php");
        }else{
            header("location:../login.php?pesan=gagal");
        }
    }
}
?>