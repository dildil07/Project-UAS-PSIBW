<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

include("./config/database.php");

if (isset($_POST['submit'])) {
	$id_dosen = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];

	$sql = "UPDATE dosen SET id_dosen = '$id_dosen' , nama = '$nama', alamat='$alamat' WHERE id_dosen = '$id_dosen'";

	if ($con->query($sql) === TRUE) {
		echo "data berhasil diubah";
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
	<title>Edit Data Dosen</title>
	<link href="style.css" rel="stylesheet" type="text/css">
	
</head>

<body class="loggedin">
	<nav class="navtop">
		<div>
			<h1><a href="home.php">Sistem Informasi Akademik</a></h1>
			<a href="profile.php"><i class="fas fa-user-circle"></i><?= $_SESSION['name'] ?></a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	</nav>
	<div class="content">
		<h2>Edit Data Dosen</h2>
		<?php
		$id_dosen = $_GET['id_dosen'];
		$qry = mysqli_query($con, "SELECT * FROM dosen WHERE id_dosen = '$id_dosen'");
		$row = mysqli_fetch_assoc($qry);

		$id_dosen = $row['id_dosen'];
		$nama    = $row['nama'];
		$alamat    = $row['alamat'];
		?>
		<form action="edit_data_dosen.php" method="post" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?= $id_dosen ?>" >
			<input type="text" name="nama" placeholder="Masukkan Nama" value="<?= $nama ?>" style="margin-left:20px; margin-bottom:5px; padding:5px" required><br>
			<textarea name="alamat" placeholder="Alamat..." style="margin-left:20px; margin-bottom:5px; padding:5px" required><?= $alamat ?></textarea><br><br>
			<button type="submit" name="submit" style="margin-left:20px; margin-bottom:5px; padding:5px">Simpan Perubahan</button>
		</form>
	</div>
</body>

</html>