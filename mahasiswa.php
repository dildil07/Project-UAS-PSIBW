<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
     header('Location: index.php');
     exit;
}

include("./config/database.php");
?>

<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <title>Data Mahasiswa</title>
     <link href="style.css" rel="stylesheet" type="text/css"> 
     
</head>

<body class="loggedin">
     <nav class="navtop">
          <div>
          <h1 ><a href="home.php">Sistem Informasi Akademik</a></h1>
               <a href="profile.php"><i class="fas fa-user-circle"></i><?= $_SESSION['name'] ?></a>
               <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
          </div>
     </nav>
     <div class="content">
          <h2>Data Mahasiswa</h2>

          <?php
          echo "<table border='0' cellpadding='3' cellspacing='3' width='100%'>
              <tr>
              <td colspan=4>
              		<a href='tambah_data_mahasiswa.php'><button style='margin-left:8px; padding: 3px'>Tambah Data</button></a></td>
              <td colspan=4 style='text-align:right;'>
            </table>";

          echo "<table border='1' cellpadding='3' cellspacing='3' width='100%'>
              <tr style='text-align:center;'><td>NO</td><td>NIM</td>
                    <td>NAMA</td><td>PRODI</td>
                    <td>EMAIL</td><td>AGAMA</td>
                    <td>STATUS</td><td>ALAMAT</td><td>PROSES</td>
              </tr>";

          $no = 1;
          $qry = mysqli_query($con, "SELECT COUNT(*) as total FROM mahasiswa");
          if ($data = mysqli_fetch_array($qry)['total'] != 0) {
               $qry = mysqli_query($con, "SELECT * FROM mahasiswa");
               while ($data = mysqli_fetch_array($qry)) {
                    echo "<tr>
	            <td>$no</td>
	            <td>$data[nim]</td>
	            <td>$data[nama]</td>
	            <td>$data[prodi]</td>
	            <td>$data[email]</td>
	            <td>$data[agama]</td>
	            <td>$data[status]</td>
	            <td>$data[alamat]</td>
	            <td align='center'>
	            	<a href='edit_data_mahasiswa.php?nim=$data[nim]'><button style='width:60%'>Edit</button></a><br>
	            	<a href='hapus_data_mahasiswa.php?nim=$data[nim]'><button style='width:80%'>Delete</button></a>
	       	</td>
	       	</tr>";
                    $no++;
               }
          } else {
               echo "<h3>Data Mahasiswa Kosong!</h3>";
          }
          echo "</table>";
          ?>
          <br>
          <br>
           <button class="button1" style="margin-left:20px; margin-bottom:5px; padding:5px; width:80px">
                        <a href="home.php">Back</a>
                   </button>
     </div>
</body>

</html>