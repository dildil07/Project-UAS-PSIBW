<?php

include './config/database.php';

$errorMessage = '';

if (isset($_POST['register-submit'])) {
	if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$errorMessage =  'Email telah terdaftar';
		} else {
			if ($stmt = $con->prepare('INSERT INTO accounts (email,password) VALUES (?,?)')) {
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$stmt->bind_param('ss', $_POST['email'], $password);
				$stmt->execute();
				header('Location: index.php');
			} else {
				$errorMessage =  'Could not prepare statement!';
			}
		}
	} else {
		$errorMessage =  'Could not prepare statement!';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css"> 

</head>
<body>

<div>
<form action="register.php">
  <div class="container-register">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <input type="text" placeholder="Enter Email" name="email" id="email" required><br>
    <input type="password" placeholder="Enter Password" name="password" id="password" required><br>
    <button type="submit" class="registerbtn" name="register-submit" value="Register">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>
</div>

</body>
</html>
