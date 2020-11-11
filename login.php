<?php 

require_once "core/init.php";

if (isset($_SESSION['user']) ){ // apakah session nya udah ada belum 
	header('Location: index.php');	// jika ada maka redirect ke index
} else {



$error = '';
if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$pass = $_POST['password'];

	if(!empty(trim($nama)) && !empty(trim($pass)) ){

	   if(cek_data($nama, $pass)){
	   		$_SESSION['user'] = $nama;
	   		header('Location: index.php');
	   } else {
	   	$error = ' ada masalah saat Login';
	   }
	} else {
	   $error = 'Nama dan Password Wajib diisi';
	}
}

require_once "view/header.php";
 ?>

<div class="login">
 <form action="" method="post">
 	<label for="username">Username</label><br>
 	<input type="text" name="nama" value=""><br><br>

 	<label for="password">Password</label><br>
 	<input type="password" name="password" value=""><br><br>

 	<div id="error"><?php echo $error; ?></div><br>

 	<input type="submit" name="submit" value="submit">
 </form>
</div>
 <?php require_once "view/footer.php"; ?>

 <?php } ?>