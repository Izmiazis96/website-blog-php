<?php 

require_once "core/init.php";
require_once "view/header.php";

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

?>
<div class="each_article">
<p id="judul_single">
	<?= $judul_awal; ?>	
</p>

<p id="isi_single">
	<?= $isi_awal; ?>
</p>

<p id="tag_single">
	Tag: <?= $tag_awal; ?>	
</p>
</div>



 <?php require_once "view/footer.php"; ?>