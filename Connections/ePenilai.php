<?php
$username = "u846469917_epenilai";
$password = "shati5620";
$hostname = "localhost";
$db_name = "u846469917_epenilai";

//connection to the database
$mysqli = new mysqli($hostname, $username, $password, $db_name);
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
