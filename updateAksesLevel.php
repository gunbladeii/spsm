<?php
$servername = "localhost";
$username = "spsmkpmc_spsm";
$password = "shati5620";
$dbname = "spsmkpmc_ePenilai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$noIC = $_POST['noIC'];
$akses= $_POST['akses'];

$sql = "UPDATE login SET aksesLevel='$akses' WHERE noIC = '$noIC'";

if ($conn->query($sql) === TRUE) {
    echo '<img src="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/tick_green.png" width="20" height="20">';
	
} else {
    echo '<img src="https://www.shareicon.net/data/2017/02/24/879485_green_512x512.png" width="20" height="20">';
}

$conn->close();
?>