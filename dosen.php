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
     <title>Data Dosen</title>
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
          <h2>Data Dosen</h2>

          <?php
          echo "<table border='0' cellpadding='3' cellspacing='3' width='100%'>
              <tr>
              <td colspan=4>
              		<a href='tambah_data_dosen.php'><button style='padding: 3px'>Tambah Data</button></a></td>
              <td colspan=4 style='text-align:right;'>
            </table>";
               echo "<table border='1' cellpadding='3' cellspacing='3' width='100%'>
              <tr style='text-align:center;'><td>NO</td>
                    <td>NAMA</td><td>ALAMAT</td><td>PROSES</td>
              </tr>";

          $no = 1;
          $qry = mysqli_query($con, "SELECT COUNT(*) as total FROM dosen");
          if ($data = mysqli_fetch_array($qry)['total'] != 0) {
               $qry = mysqli_query($con, "SELECT * FROM dosen");
               while ($data = mysqli_fetch_array($qry)) {


                 
                    echo "<tr>
	            <td>$no</td>
	            <td>$data[nama]</td>
	            <td>$data[alamat]</td>
	            <td align='center'>
	            	<a href='edit_data_dosen.php?id_dosen=$data[id_dosen]'><button style='width:25%' >Edit</button></a><br>
	            	<a href='hapus_data_dosen.php?id_dosen=$data[id_dosen]'><button style='width:35%'>Delete</button></a>
	       	</td>
	       	</tr>";
                    $no++;
               }
          } else {
               echo "<h3>Data Dosen Kosong!</h3>";
          }
          echo "</table>";

                   ?>
                    <br>
                    <br>
                   <button class="button1">
                        <a href="home.php">Back</a>
                   </button>
     </div>
</body>

</html>