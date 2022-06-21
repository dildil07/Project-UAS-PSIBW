<?php

session_start();

include './config/database.php';

$errorMessage = '';

if (isset($_POST['login-submit'])) {
	if (!isset($_POST['email'], $_POST['password'])) {
		exit('Please fill both the username and password fields!');
	}

	if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		$stmt->store_result();
	}

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		if (password_verify($_POST['password'], $password)) {
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['email'];
			$_SESSION['id'] = $id;
			header('Location: home.php'); // redirect page
		} else {
			$errorMessage =  'Email/password salah';
		}
	} else {
		$errorMessage =  'Email/password salah';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css"> 
</head>
<body>

<center><h2>Selamat Datang</h2><center>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" style="size:50px">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <input type="text" name="email" placeholder="Email" id="email" required><br>
      <input type="password" name="password" placeholder="Password" id="password" required> <br>       
      <button type="submit" name="login-submit" value="Login" >Login</button><br><br>
      <span style="color: gray;">Belum punya akun? Silahkan <a href="register.php" style="text-decoration: none; color: #45b39d; font-weight: bold;">Register</a></span><br>
    </div>
   </form>
</div>


<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>