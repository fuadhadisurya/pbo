<?php 
include '../models/PengunjungModel.php';
$db = new PengunjungModel();
 
$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
 	$db->input($_POST['nama'],$_POST['tipeAnggota'],$_POST['jenisKelamin'],$_POST['umur'],$_POST['alamat'],$_POST['tanggal']);
 	header("location:../tables.php");
 }elseif($aksi == "tambahPengunjung"){ 	
	$db->input($_POST['nama'],$_POST['tipeAnggota'],$_POST['jenisKelamin'],$_POST['umur'],$_POST['alamat'],$_POST['tanggal']);
 	header("location:../index.php");
 }elseif($aksi == "hapus"){ 	
 	$db->hapus($_GET['id']);
	header("location:../tables.php");
 }elseif($aksi == "update"){
 	$db->update($_POST['id'],$_POST['nama'],$_POST['tipeAnggota'],$_POST['jenisKelamin'],$_POST['umur'],$_POST['alamat']);
 	header("location:../tables.php");
 }
?>