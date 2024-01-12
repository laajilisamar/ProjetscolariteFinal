<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "scolarite1";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}
?>
  