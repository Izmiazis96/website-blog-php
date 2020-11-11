<?php 
require_once "core/init.php";

if (!isset($_SESSION['user']) ){ // apakah session nya udah ada belum 
	header('Location: login.php');	// jika ada maka redirect ke index
}

 
if(isset($_GET['id'])) {
	if(hapus_data($_GET['id'])) {
		header('Location: index.php');
	}	
	else echo " data gagal di hapus";
}

 ?>