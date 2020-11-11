<?php 

require_once "core/init.php";
require_once "view/header.php";

if(!$_SESSION['user']){
	header('Location: login.php');
}

$error = '';
if(isset($_POST['submit'])){
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$tag = $_POST['tag'];

	if(!empty(trim($judul)) && !empty(trim($isi)) ){

	   if(tambah_data($judul, $isi, $tag)){
	   		header('Location: index.php');
	   } else {
	   	$error = ' ada masalah saat menambah data';
	   }
	} else {
	   $error = 'judul dan konten wajib diisi';
	}
}

 ?>

 <form action="" method="post">
 	<label for="judul">Judul</label><br>
 	<input type="text" name="judul" value=""><br><br>

 	<label for="isi">Isi</label><br>
 	<textarea class="ckeditor" id="ckeditor" name="isi" cols="40" rows="8"></textarea><br><br>

 	<label for="tag">Tag</label><br>
 	<input type="text" name="tag" value=""><br><br>

 	<div id="error"><?php echo $error; ?></div><br>

 	<input type="submit" name="submit" value="submit">
 </form>
 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

 <?php require_once "view/footer.php"; ?>