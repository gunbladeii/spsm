<?php require('Connections/ePenilai.php'); ?>
<?php session_start();
$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
$noIC = $_SESSION['MM_Username'];
$sah = $_POST['sah'];
if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataPengesahan SET sah='$sah' WHERE noIC='$noIC'");
  header("Location: main_menu.php");
}


$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}

$Recordset2 = $mysqli->query("SELECT * FROM dataPengesahan WHERE noIC = '$colname_Recordset2'");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
<title>Pengakuan</title>
</head>
<body>
               <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[Pengesahan]</Strong> 
                                    
                            	</p>
                            </div>
                        </div>
                        <span class="form-group">
                        
                   </span>                   </div>
                    
<form action="<?php echo $editFormAction; ?>" method="POST" name="prosesSumbangan">
<br/>
<div class="row">
<div class="col-sm-8 col-sm-offset-2 text">
<div class="description">
<p>Dengan ini saya memperaku bahawa segala maklumat ini adalah benar dan saya bertanggungjawab atas maklumat yang diberikan.</p>
</div>
</div>
</div>
<br/>
    <div class="form-group"> <!-- Submit Button -->
    <input name="noIC" type="hidden" value="<?php echo $row_Recordset1['noIC']; ?>" />
    <input name="sah" id="sah" type="hidden" value="Sah"/>
    <button type="submit" name="submit" class="btn btn-primary" onclick="javascript:alert('Pendaftaran selesai.Terima kasih atas kerjasama anda')">Pengakuan</button>
	</div>
</form>

</body>
</html>
