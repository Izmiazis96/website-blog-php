<?php 
require_once "core/init.php";
$super_user = $login = false;


if(isset($_SESSION['user'])){ // jika session nya sudah ada/login maka true
	$login = true;
	if(cek_status($_SESSION['user']) == 1 ){ // jika statu= 1 maka dia sebagai superadmin
		$super_user = true;
	}
}

$articles = tampilkan();

// die(print_r($articles));
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$articles = hasil_cari($cari);
}

require_once "view/header.php";
?>

<form action="" method="get" id="cari">
	<input type="search" name="cari" id="pencarian" placeholder="Silahkan cari disini..">
</form>

<?php while($row = mysqli_fetch_assoc($articles)): ?>
<div class="each_article">
	<h3><a href="single.php?id=<?php echo $row['id']; ?>"><?php echo $row['judul']; ?></a></h3>
	<p>
	<?= excerpt($row['isi']); ?>
	</p>
	<p class="waktu"><?php echo $row['waktu']; ?></p>
	<p class="tag">Tag: <?php echo $row['tag']; ?></p>

<?php if($login == true): ?>
	  <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
	  <?php if($super_user == true ): ?>  
	  <a href="delete.php?id=<?php echo $row['id'];?>">Hapus</a>
	  <?php endif; ?>
	<?php endif; ?>  
</div>
<?php endwhile; ?>



<?php
require_once "view/footer.php";
 ?>
