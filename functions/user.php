<?php 

function cek_data($nama, $pass){
	global $link;

	$nama = escape($nama);
	$pass = escape($pass);

	$pass = md5($pass);

	$query = "SELECT * FROM users WHERE username = '$nama' AND password = '$pass'";
	if($result = mysqli_query($link, $query)) {
		if(mysqli_num_rows($result) != 0) return true;
 		else return false;
	}
	// $result = mysqli_query($link, $query);
	// $hash = mysqli_fetch_assoc($result) ['password'];

	// if(password_verify($pass,$hash) ){
	// 	return true;
	// } else {
	// 	return false;
	// }
}

function regsiter_cek_nama($nama){
	global $link;

	$nama = escape($nama);

	$query = "SELECT * FROM users WHERE username = '$nama' "; // apakah nama nya ada disini
	if($result = mysqli_query($link, $query)) { // lalu diuji
		if(mysqli_num_rows($result) == 0) return true; // jika hasil nya sama dengan 0 atau belum pernah di isi namanya maka true
 		else return false;
	}
}	

// function escape($data){
// 	global $link;
// 	return mysqli_real_escape_string($link, $data);
// }

function cek_status($username){
	$nama = escape($username);

	$query =  "SELECT status FROM users WHERE username='$nama'";
	global $link;

	if($result= mysqli_query($link, $query)){ // jika query nya berhasil
		while($row = mysqli_fetch_assoc($result)){ // cek isinya
			$status = $row['status'];
		}
		return $status;
	} 
}

function register_user($nama, $pass){
	$nama = escape($nama); // sudah di refactor
	$pass = escape($pass);
	// hash
	$pass = md5($pass);

	// $judul = mysqli_real_escape_string($link, $judul); // mencegah user iseng
	$query = "INSERT INTO users (username, password, status) VALUES ('$nama','$pass', 0)";
	return run($query);
}

 ?>