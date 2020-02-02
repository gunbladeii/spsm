<?php require('Connections/ePenilai.php'); ?>
<?php
session_start();
if($_SESSION['aksesLevel'] != 'p')
    {
      header('Location:denied.php');  
    }
?>
<?php

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}

$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_dataPengesahan = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_dataPengesahan = $_SESSION['MM_Username'];
}

$dataPengesahan = $mysqli->query("SELECT * FROM dataPengesahan WHERE noIC = '$colname_dataPengesahan' AND sah='Sah'");
$row_dataPengesahan = mysqli_fetch_assoc($dataPengesahan);
$totalRows_dataPengesahan = mysqli_num_rows($dataPengesahan);

$Recordset5 = $mysqli->query("SELECT * FROM (((((((login 
					INNER JOIN dataBengkel ON login.noIC = dataBengkel.noIC) 
					INNER JOIN dataMengajar ON login.noIC = dataMengajar.noIC)
					INNER JOIN dataPendidikan ON login.noIC = dataPendidikan.noIC)
					INNER JOIN dataPengesahan ON login.noIC = dataPengesahan.noIC)
					INNER JOIN dataPerkhidmatan ON login.noIC = dataPerkhidmatan.noIC)
					INNER JOIN dataSumbangan ON login.noIC = dataSumbangan.noIC)
					INNER JOIN dataWaris ON login.noIC = dataWaris.noIC)					
					WHERE dataBengkel.noIC='$colname_Recordset1' GROUP BY dataBengkel.noIC ORDER BY dataBengkel.nama ASC;");
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>
<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ePenilai</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
        <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
        <link rel="stylesheet" href="tabledesign2.css">
        
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    </head>

    <body>
    
    <div></div>
    
      <div id="myDiv">
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            
                            <div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Menu Pilihan</h3>
                                        <p>Sila pilih menu berkaitan</p>	                            		
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fas fa-pencil-alt"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form action="" role="form" method="" class="login-form" name="prosesLogin">
                                      	<?php if ($totalRows_dataPengesahan > 0) { // Show if recordset not empty ?>
  										<a href="pendaftaran_insert.php"><button type="button" class="btn"><i class="fas fa-marker"></i> Daftar Maklumat Bengkel Baharu</button></a>
                                        <p></p>
                                        <a href="rekodPejabat.php"><button type="button" class="btn"><i class="fas fa-edit"></i> Kemaskini Maklumat Semasa</button></a>
                                        <?php } // Show if recordset not empty ?>
                                        
                                        <?php if ($totalRows_dataPengesahan == 0) { // Show if recordset empty ?>
                                        <p>Tahniah. Akaun ada telah <strong>DISAH</strong> oleh <strong>Penyelaras Projek</strong> anda.</p>
  										<a href="main.php"><button type="button" class="btn">Teruskan Pendaftaran</button></a>
  										<?php } // Show if recordset empty ?>
                                        <p></p>
                                        <a href="logout.php"><button type="button" name="submit" class="btn btn-primary"><i class="fas fa-home"></i> Halaman Utama</button></a>
                                    </form>
                                    </br>
                                    <h4 align="center">Status Pengisian e-Penilai</h4>
       <table>
  <thead>
    <tr>
      <th scope="col">Rekod Perkhidmatan</th>
      <th scope="col">Rekod Waris</th>
      <th scope="col">Rekod Mengajar</th>
      <th scope="col">Rekod Akademik</th>
      <th scope="col">Rekod Penglibatan</th>
      <th scope="col">Pengesahan</th>
      
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td data-label="1.Rekod Perkhidmatan"><?php if($row_Recordset5["alamatKerja"] != NULL){echo '<i class="fas fa-check" style="color:green"></i>';} else {echo '<i class="fas fa-times" style="color:red"></i>';}?></td>
      <td data-label="2.Rekod Waris"><?php if($row_Recordset5["namaKecemasan"] != NULL){echo '<i class="fas fa-check" style="color:green"></i>';} else {echo '<i class="fas fa-times" style="color:red"></i>';}?></td>
      <td data-label="3.Rekod Mengajar"><?php if($row_Recordset5["subjekAjar"] != NULL){echo '<i class="fas fa-check" style="color:green"></i>';} else {echo '<i class="fas fa-times" style="color:red"></i>';}?></td>
      <td data-label="4.Rekod Akademik"><?php if($row_Recordset5["khususSM"] != NULL || $row_Recordset5["khususDiploma"] != NULL) {echo '<i class="fas fa-check" style="color:green"></i>';} else {echo '<i class="fas fa-times" style="color:red"></i>';}?></td>
      <td data-label="5.Rekod Penglibatan"><?php if($row_Recordset5["sumbangan1"] != NULL){echo '<i class="fas fa-check" style="color:green"></i>';} else {echo '<i class="fas fa-times" style="color:red"></i>';}?></td>
      <td data-label="6.Pengesahan"><?php if($row_Recordset5["sah"] == 'Sah'){echo '<i class="fas fa-check" style="color:green"></i>';} else {echo '<i class="fas fa-times" style="color:red"></i>';}?></td>
    </tr>
    
  </tbody>
</table>
                                    
			                    </div>
                        	</div>
                            </div>
                        </div>
                    </div>                   
                   
        </div>
        

        <!-- Footer -->
        
</div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        

   
    </body>

</html>