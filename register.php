<?php 

require_once "core/init.php";

if (isset($_SESSION['user']) ){ // apakah session nya udah ada belum 
	header('Location: index.php');	// jika ada maka redirect ke index
} else {



$error = '';
if(isset($_POST['submit'])){ // apakah tombol submit sudah di tekan atau belum
	$nama = $_POST['nama'];
	$pass = $_POST['password'];

	if(!empty(trim($nama)) && !empty(trim($pass)) ){ // apakah nama dan password ada isinya, jika ada
	   if(regsiter_cek_nama($nama)){				 // jika namannya masih kosong, maka bisa buat register
	   	if(register_user($nama, $pass)){			 // dibuat insert jika datanya sudah benar
	   		$_SESSION['user'] = $nama;				 // session telah dibuat
	   		header('Location: index.php');
	   } else {
	   		$error = ' ada masalah saat daftar.';
	   }
	  }else{
	  	$error = 'Nama sudah pernah digunakan, coba nama lain';
	  } 

	}else{
	   $error = 'Nama dan Password Wajib diisi';
	}
}

require_once "view/header.php";
 ?>

 <form action="" method="post">
 	<label for="username">Username</label><br>
 	<input type="text" name="nama" value=""><br><br>

 	<label for="password">Password</label><br>
 	<input type="password" name="password" value=""><br><br>

 	<div id="error"><?php echo $error; ?></div><br>

 	<input type="submit" name="submit" value="submit">
 </form>

 <?php require_once "view/footer.php"; ?>

 <?php } ?>