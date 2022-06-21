<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

include("./config/database.php");

if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];

	$sql = "INSERT INTO dosen(nama,alamat) VALUES ('$nama','$alamat')";

	if ($con->query($sql) === TRUE) {
		echo "data berhasil disimpan";
		header('Location: dosen.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Tambah Data Dosen</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	
</head>

<body class="loggedin">
	<nav class="navtop">
		<div>
			<h1><a href="home.php" >Sistem Informasi Akademik </a></h1>
			<a href="profile.php"><?= $_SESSION['name'] ?></a>
			<a href="logout.php">Logout</a>
		</div>
	</nav>
	<div class="content">
		<h2>Tambah Data Dosen</h2>
		<form action="tambah_data_dosen.php" method="post" accept-charset="utf-8">
			<input type="text" name="nama" placeholder="Masukkan Nama" style="margin-left:20px; margin-bottom:5px; padding:5px" required><br>
			<textarea name="alamat" placeholder="Alamat..." style="margin-left:20px; margin-bottom:5px; padding:5px" required></textarea><br><br>
			<button type="submit" name="submit" style="margin-left:20px; margin-bottom:5px; padding:5px" >Simpan</button>
		</form>
	</div>
</body>

</html>