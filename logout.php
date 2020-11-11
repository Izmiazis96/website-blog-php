<?php 

require_once "core/init.php";

if(!$_SESSION['user']){
	header('Location: login.php');
}

session_destroy();
header('Location: login.php');

 ?>