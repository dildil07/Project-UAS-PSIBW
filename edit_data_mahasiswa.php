<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

include("./config/database.php");

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$prodi = $_POST['prodi'];
	$email = $_POST['email'];
	$agama = $_POST['agama'];
	$status = $_POST['status'];
	$alamat = $_POST['alamat'];

	$sql = "UPDATE mahasiswa SET nim = '$nim' , nama = '$nama', prodi = '$prodi' ,email = '$email', agama = '$agama' ,status = '$status', alamat='$alamat' WHERE id = '$id'";

	if ($con->query($sql) === TRUE) {
		echo "data berhasil diubah";
		header('Location: mahasiswa.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Edit Data Mahasiswa</title>
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
		<h2>Edit Data Mahasiswa</h2>
		<?php
		$nim = $_GET['nim'];
		$qry = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
		$row = mysqli_fetch_assoc($qry);

		$id = $row['id'];
		$nim = $row['nim'];
		$nama    = $row['nama'];
		$prodi    = $row['prodi'];
		$email    = $row['email'];
		$agama    = $row['agama'];
		$status    = $row['status'];
		$alamat    = $row['alamat'];
		?>

		<form action="edit_data_mahasiswa.php" method="post" accept-charset="utf-8">
			<input type="hidden" name="id" value="<?= $id ?>" >
			<input type="text" name="nim" placeholder="Masukkan NIM" style="margin-left:20px; margin-bottom:5px; padding:5px;" value="<?= $nim ?>" required><br>
			<input type="text" name="nama" placeholder="Masukkan Nama" style="margin-left:20px; margin-bottom:5px; padding:5px" value="<?= $nama ?>" required><br>
			<select name="prodi" style="margin-left:20px; margin-bottom:5px; padding:5px" required>
				<option value="SI" <?php
									if ($prodi == "SI") {
									?> selected <?php } ?>>SI</option>
				<option value="MI" <?php
									if ($prodi == "MI") {
									?> selected <?php } ?>>MI</option>
			</select><br>
			<input type="email" name="email" placeholder="Masukkan Email" value="<?= $email ?>" style="margin-left:20px; margin-bottom:5px; padding:5px" required><br>
			<select name="agama"style="margin-left:20px; margin-bottom:5px; padding:5px" required>
				<option value="Islam" <?php
										if ($agama == "Islam") {
										?> selected <?php } ?>>Islam</option>
				<option value="Kristen" <?php
										if ($agama == "Kristen") {
										?> selected <?php } ?>>Kristen</option>
				<option value="Buddha" <?php
										if ($agama == "Buddha") {
										?> selected <?php } ?>>Buddha</option>
			</select>
			<select name="status" style="margin-left:20px; margin-bottom:5px; padding:5px" required>
				<option value="Aktif" <?php
										if ($status == "Aktif") {
										?> selected <?php } ?>>Aktif</option>
				<option value="Cuti" <?php
										if ($status == "Cuti") {
										?> selected <?php } ?>>Cuti</option>
			</select><br>

			<textarea name="alamat" placeholder="Alamat..." style="margin-left:20px; margin-bottom:5px; padding:5px" required><?= $alamat ?></textarea><br><br>
			<button type="submit" name="submit" style="margin-left:20px; margin-bottom:5px; padding:5px">Simpan Perubahan</button> 
		</form>
	</div>
</body>

</html>