<?php 

require_once "core/init.php";
require_once "view/header.php";

if(!$_SESSION['user']){
	header('Location: login.php');
}


$error ='';
$id = $_GET['id'];

if(isset($_GET['id'])){
	$article = tampilkan_per_id($id);
	while($row = mysqli_fetch_assoc($article)){
		$judul_awal = $row['judul'];
		$isi_awal	= $row['isi'];
		$tag_awal	= $row['tag'];
	}
}

if(isset($_POST['submit'])){
	$judul = $_POST['judul'];
	$isi   = $_POST['isi'];
	$tag   = $_POST['tag'];

	if(!empty(trim($judul)) && !empty(trim($isi)) ){

		if(edit_data($judul, $isi, $tag, $id)){
			header('Location: index.php');
		} else {
			$error = 'ada masalah dalam edit data';
		}
	} else {
		$error = "Judul dan isi wajib diisi";
	}
}

 ?>

 <form action="" method="post">
 	<label for="judul">Judul</label><br>
 	<input type="text" name="judul" value="<?php echo $judul_awal; ?>"> <br><br>

 	<label for="isi">Isi</label><br>
 	<textarea class="ckeditor" id="ckeditor" name="isi"  cols="40" rows="8" ><?php echo $isi_awal; ?></textarea> <br><br>

 	<label for="tag">Tag</label><br>
 	<input type="text"name="tag" value="<?php echo $tag_awal; ?>"><br><br>

 	<div id="error"><?php echo $error; ?></div>

 	<input type="submit" name="submit" value="Update">
 </form>
 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>


 <?php require_once "view/footer.php"; ?>