<?php
$login = $_POST["username"];
$password = $_POST["password"];
$action = $_POST["action"];

if ($action == "start") {
	require 'send_registration_to_database.php';
}
elseif ($action == "stop") {
	require 'send_deletion_to_database.php';
}
else {
	echo "unreachable Code<br>action: ".$action;
}
?>
