<?php 

$login = false;
if(isset($_SESSION['user'])){ // jika session user nya sudah ada maka true
    $login = true;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mohamad Ismi Azis">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/style.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <title>Blog</title>
</head>
<body>
	<h1>Blog Izmi Tech</h1>
	<div id="menu">
		<a href="index.php">Home</a>
		<a href="add.php">Tambah</a>

        <?php if($login == true): ?>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login.php">Login</a>
        <?php endif; ?>    
	</div>
</body>
</html>