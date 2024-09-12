<?php
include_once 'connect_to_database.php';
include_once 'functions.php';
$username = $_POST["username"];
$password = $_POST["password"];
$action = $_POST["action"];
$users = sql_select_credentials($conn);
$is_already_registred = is_in_haystack("$username", $users);
if ($is_already_registred) {
	echo "Service fuer dich erfolgreich abbestellt\n";
	sql_copy_new_into_userData($conn);
	sql_delete_from_credentials($conn, $username, $password);
} else {
	echo "Benutzername Passwort Kombo ist nicht registriert<br>";
}
require 'index.php';
?>
