<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}

include("./config/database.php");

$id_dosen = $_GET['id_dosen'];

$sql = "DELETE FROM dosen WHERE id_dosen=$id_dosen";
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: dosen.php');
} else {
  echo "Error deleting record: " . $conn->error;
}
