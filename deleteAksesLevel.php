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
$judul= $_POST['akses'];

$sql = "UPDATE dataBengkel SET judul='$judul' WHERE noIC = '$noIC'";

if ($conn->query($sql) === TRUE) {
    echo '<i style="color:green" class="fas fa-spinner"></i>';
	
} else {
    echo '<i style="color:red" class="fas fa-times"></i>';
}

$conn->close();
?>