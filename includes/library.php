<?php
$servername = "localhost";
$database = "hamzasalimattarwala";
$username = "hamzasalimattarwala";
$pass = "";
// Create connection
$conn = mysqli_connect($servername, $username, $pass, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
