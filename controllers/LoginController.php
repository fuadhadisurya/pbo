<?php 
include '../models/LoginModel.php';
$db = new LoginModel();
 
$aksi = $_GET['aksi'];
    if($aksi == "cekLogin"){
        session_start();
        $db->cekLogin($_POST['username'],$_POST['password']);
    }elseif ($aksi == "logout") {
        // mengaktifkan session
        session_start();
        
        // menghapus semua session
        session_destroy();
        
        // mengalihkan halaman sambil mengirim pesan logout
        header("location:../login.php?pesan=logout");
    }
?>