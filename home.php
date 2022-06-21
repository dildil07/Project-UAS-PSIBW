<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
     header('Location: index.php');
     exit;
}
?>

<!DOCTYPE html>
<html>
  
<head>
     <meta charset="utf-8">
     <title>Home Page</title>
     <link href="style.css" rel="stylesheet" type="text/css"> 
<body class="loggedin">
     <nav class="navtop">
          <div>
               <h1 ><a href="home.php">Sistem Informasi Akademik</a></h1>
               <a href="profile.php"><i class="fas fa-user-circle"></i><?= $_SESSION['name'] ?></a>
               <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
          </div>
     </nav>
     <div class="content">
          <h2>Home Page</h2>
          <p id="welcome">Selamat Datang, <?= $_SESSION['name'] ?>!</p>
         
          <ul>
               <li><a href="mahasiswa.php" style="text-decoration: none; font-weight: bold;">Kelola Data Mahasiswa</a></li>
               <br>
               <li><a href="dosen.php" style="text-decoration: none; font-weight: bold;">Kelola Data Dosen</a></li>
               <br>
               
          </ul>
          <br>
     </div>
</body>

</html>