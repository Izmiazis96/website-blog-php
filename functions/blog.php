<?php 

function tampilkan() {
	global $link;

	$query = "SELECT * FROM blog";
	// $result = mysqli_query($link, $query) or die('gagal menampilkan data');

	// return $result;
	return result($query);
}

function tampilkan_per_id($id){
	global $link;

	$query = "SELECT * FROM blog WHERE id=$id";
	return result($query);
}

function hasil_cari($cari){
	$query = "SELECT * FROM blog WHERE judul LIKE '%$cari%'";
	return result($query);
}

// refactor code
function result($query){
	global $link;
	if($result = mysqli_query($link, $query) or die ('gagal menampilkan data')){
		return $result;
	}
}

function tambah_data($judul, $isi, $tag){
	$judul = escape($judul); // sudah di refactor
	$konten= escape($konten);
	// $judul = mysqli_real_escape_string($link, $judul); // mencegah user iseng
	$query = "INSERT INTO blog (judul, isi, tag) VALUES ('$judul','$isi','$tag')";
	return run($query);
}

function edit_data($judul, $isi, $tag, $id){
	$query = "UPDATE blog SET judul='$judul', isi='$isi', tag='$tag' WHERE id=$id";
	return run($query);
}

function hapus_data($id){
	$query = "DELETE FROM blog WHERE id=$id";
	return run($query);
}



// refactoring
function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;
	else return false;
}


function excerpt($string){
	$string = substr($string, 0,25); // (masukan variabel nya , di mulai keberapa, panjang kalimat nya)
	return $string . "...";
}

function escape($data){
	global $link;
	return mysqli_real_escape_string($link, $data); // perlu dua koneksi yg pertama link, dan datanta
}
 
 ?>
