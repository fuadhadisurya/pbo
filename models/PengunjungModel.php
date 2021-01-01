<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'config/Database.php';
include '../config/Database.php';
class PengunjungModel extends Database{
    function __construct (){
        parent::__construct();
    }

    function tampil_data(){
        $data = mysqli_query($this->conn, "SELECT * FROM pengunjung");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input($nama,$tipeAnggota,$jenisKelamin,$umur,$alamat,$tanggal){
        mysqli_query($this->conn,"INSERT INTO pengunjung VALUES(null,'$nama','$tipeAnggota','$jenisKelamin','$umur','$alamat','$tanggal')");
    }

    function hapus($id){
        mysqli_query($this->conn,"DELETE FROM pengunjung WHERE id='$id'");
    }

    function edit($id){
        $data = mysqli_query($this->conn,"SELECT * FROM pengunjung WHERE id='$id'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
     
    function update($id,$nama,$tipeAnggota,$jenisKelamin,$umur,$alamat){
        mysqli_query($this->conn,"UPDATE pengunjung SET nama='$nama', tipe_anggota='$tipeAnggota', jenis_kelamin='$jenisKelamin', umur='$umur', alamat='$alamat' WHERE id='$id'");
    }

    function report(){
        $data = mysqli_query($this->conn, "SELECT * FROM pengunjung");
        return $data;
    }

    function hitungTotal(){
        $data = mysqli_query($this->conn, "SELECT COUNT(id) AS total FROM pengunjung");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function hitungBulanan(){
        $tanggal = date("Y-m");
        $data = mysqli_query($this->conn, "SELECT COUNT(id) AS total FROM pengunjung WHERE tanggal LIKE '$tanggal%'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function hitungHarian(){
        $tanggal = date("Y-m-d");
        $data = mysqli_query($this->conn, "SELECT COUNT(id) AS total FROM pengunjung WHERE tanggal LIKE '$tanggal%'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
}
?>