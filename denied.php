<?php require('Connections/ePenilai.php'); ?>
<?php session_start();?>
<?php

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}

$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$joinPP = $mysqli->query("SELECT dataSubjekPP.noIC, login.nama, dataSubjekPP.subjekPP FROM dataSubjekPP INNER JOIN  login ON dataSubjekPP.noIC = login.noIC");
$row_joinPP = mysqli_fetch_assoc($joinPP);
$totalRows_joinPP = mysqli_num_rows($joinPP);

$colname_Recordset2 = "-1";
if (isset($_SERVER['MM_Username'])) {
  $colname_Recordset2 = $_SERVER['MM_Username'];
}
$colname2_Recordset2 = "-1";
if (isset($row_joinPP['subjekPP'])) {
  $colname2_Recordset2 = $row_joinPP['subjekPP'];
}

$Recordset2 = $mysqli->query("SELECT * FROM dataBengkel WHERE noIC = '$colname_Recordset2' AND judul = '$colname2_Recordset2'");
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
        <title>Halaman Utama</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="load.css">
		<script src="buttonNload.js"></script>
        
        
  
</head>

<body onload="myFunction()">
    
    <div id="loader"></div>
    
    <div id="myDiv">
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong>Rekod Belum Sah</strong></h1>
                            
                            <div class="description">
                            	<p>
	                            	Ribuan terima kasih Tuan/Puan <strong><?php echo strtoupper($row_Recordset1['nama'])?></strong> kerana mendaftar. Namun, nama anda masih belum <strong>DISAH</strong> untuk meneruskan aktiviti dalam aplikasi ini. Mohon rujuk kepada <strong>Penyelaras Projek</strong> anda.Terima kasih.
                            	</p>
                                                              
                               </div>
                        </div>
                    </div>

<form name="simpan" method="post">

<br />

        
    <div class="form-group"> <!-- Submit Button -->
        <a href="index.php">
	  <button type="button" name="submit" class="btn btn-primary btn-lg" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Seterusnya">Kembali ke Menu Log Masuk</button></a>
    </div>
</form>
</div>

</body>
</html>
