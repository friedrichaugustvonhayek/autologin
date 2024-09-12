<?php
include_once 'connect_to_database.php';
include_once 'functions.php';
$comment = $_POST["comment"];
sql_insert_comment($conn, $comment);
require 'index.php';
?>
