<?php
$servername = "localhost";
$username = "autologinUser";
$password = "changeThisPassword1234";
$dbname = "autologinDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
#if (!$conn) {
#  die("Connection failed: " . mysqli_connect_error());
#}
?>
