<?php
include_once 'connect_to_database.php';
include_once 'functions.php';
$username = $_POST["username"];
$password = $_POST["password"];
$action = $_POST["action"];
$users = sql_select_credentials($conn);
$is_already_registred = is_in_haystack("$username", $users);
require 'verify.php';	# returns $is_valid;
if ($is_valid) {
	if (!$is_already_registred) {
		echo "Registration to autologin successful\n";
		sql_insert_credentials($conn, $username, $password);
	} else {
		echo "Benutzername ist schon vergeben<br>";
	}
} else {
	echo "wrong credentials... ignoring request.";
}
require 'index.php';
?>
