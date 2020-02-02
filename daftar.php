<?php require('Connections/ePenilai.php'); ?>
<?php

    $noIC=$_POST['noIC'];
    $nama=$_POST['nama'];
    $jantina=$_POST['jantina'];
    $judul=$_POST['judul'];
	$tahun=$_POST['tahun'];
	$aliran=$_POST['aliran'];

if (isset($_POST["submit"])){
    $mysqli->query("INSERT INTO dataBengkel (noIC, nama, jantina, judul, tahun, aliran) VALUES ('$noIC', '$nama', '$jantina', '$judul', '$tahun', '$aliran')");
       header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataPendidikan (noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataPengesahan(noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataPerkhidmatan (noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataMarkahPenilai (noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataMengajar (noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataSumbangan (noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataWaris (noIC) VALUES ('$noIC')");
  header("Location: denied.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO login (nama, noIC) VALUES ('$nama', '$noIC')");
  header('Location: denied.php');
}

$daftarSubjekMPV = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPV' ORDER BY subjek ASC");
$row_daftarSubjekMPV = mysqli_fetch_assoc($daftarSubjekMPV);
$totalRows_daftarSubjekMPV = mysqli_num_rows($daftarSubjekMPV);

$daftarSubjekSTAM = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='STAM' ORDER BY subjek ASC");
$row_daftarSubjekSTAM = mysqli_fetch_assoc($daftarSubjekSTAM);
$totalRows_daftarSubjekSTAM = mysqli_num_rows($daftarSubjekSTAM);

$daftarSubjekKSSM = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KSSM' ORDER BY subjek ASC");
$row_daftarSubjekKSSM = mysqli_fetch_assoc($daftarSubjekKSSM);
$totalRows_daftarSubjekKSSM = mysqli_num_rows($daftarSubjekKSSM);

$daftarAliran = $mysqli->query("SELECT * FROM daftarAliran");
$row_daftarAliran = mysqli_fetch_assoc($daftarAliran);
$totalRows_daftarAliran = mysqli_num_rows($daftarAliran);
?>
<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ePenilai</title>
<!-- CSS -->
        <link rel="shortcut icon" href="img/logo.png">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<title>Rekod Bengkel</title>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">
  		<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
  		<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  		<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  		<style>
        .avatar {
            vertical-align: middle;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        </style>
  		
    </head>

    <body>
    
    <div id="myDiv">
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a href="index.php"><img src="https://lh3.googleusercontent.com/YngIRyXIlCvf1572b1gKk0-YXANTQr-hb23O4VzGk3eQ7_De6Kyg-13fsTkHHXZnG6pZ=w300" width="100" height="100" alt="Avatar" class="avatar"></a>
                            <h1><strong>Daftar Akaun e-Penilai</strong></h1>
                            <div class="description">
                            	
                                <div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Belum mendaftar <i class="fas fa-question"></i></h3>
	                            		<p><i class="fas fa-list-alt"></i> Lengkapkan maklumat berikut:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fas fa-edit"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form action="<?php echo $editFormAction; ?>" role="form" method="POST" class="registration-form" name="prosesDaftar" class="prosesDaftar" enctype="multipart/form-data">
                                    <div class="form-group"> 
                                    <i class="fas fa-sign-in-alt"></i> Maklumat Log Masuk
                                    </div>
                                    <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">No Kad Pengenalan</label>
				                        	<span id="sprytextfield2">
                                            <input type="text" name="noIC" placeholder="No. Kad Pengenalan" class="form-last-name form-control" id="form-last-name">
                                            <span class="textfieldRequiredMsg">Sila isikan No. Kad Pengenalan.</span><span class="textfieldInvalidFormatMsg">Masukkan dalam bentuk Nombor.</span></span></div>
                                     <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	
				                        	<input type="hidden" name="password" placeholder="Kata laluan" class="form-last-name form-control" id="form-last-name">
                                        <div class="form-group">                 <i class="fas fa-users-cog"></i>
                                    Maklumat Diri
                                    </div>
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-file">Gambar</label>
				                        	<input type="hidden" name="gambar" placeholder="Masukkan Gambar..." class="form-file form-control" id="form-file">
                                            <input type="hidden" name="aksesLevel" value="Belum sah"class="form-file form-control" id="form-file">
                                            <input type="hidden" name="tahun" value="<?php echo date("Y"); ?>"class="form-file form-control" id="form-file">
				                        </div>
                                        <div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Nama</label>
				                    		<span id="sprytextfield1">
                                            <input type="text" name="nama" placeholder="Nama Penuh" class="form-first-name form-control" id="form-first-name">
                                            <span class="textfieldRequiredMsg">Sila Taipkan Nama</span></span>
                                      </div>
				                        
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Jantina</label>
				                        	<span id="spryselect1">
				                        	<select name="jantina" class="form-last-name form-control">
				                        	  <option value="">Jantina</option>
				                        	  <option value="Lelaki">Lelaki</option>
				                        	  <option value="Perempuan">Perempuan</option>
			                        	    </select>
				                        	<span class="selectRequiredMsg">Sila Pilih Jantina.</span></span></div>
                                        <div class="form-group">
                                        <select name="aliran" class="form-last-name form-control">
                            <!--Pilih Aliran begin-->
                                            <option value="">Pilih Aliran</option>
                                            <?php
											do { ?>
                                            <option value="<?php echo $row_daftarAliran['aliran']?>"><?php echo $row_daftarAliran['aliran']?></option>
                                            <?php
												} while ($row_daftarAliran = mysqli_fetch_assoc($daftarAliran));
 												 $rows = mysqli_num_rows($daftarAliran);
 												 if($rows > 0) {
      												mysqli_data_seek($daftarAliran, 0);
	 												 $row_daftarAliran = mysqli_fetch_assoc($daftarAliran);	}?>
                                          </select>
                                        <span class="selectRequiredMsg">Sila Pilih Aliran Subjek.</span></span></div>
				                        <div class="form-group"><span id="spryselect3">
				            <!--Pilih Aliran end-->  
				            
				                        <label class="sr-only" for="form-last-name">Judul</label>
                                        <span id="spryselect2">
                                        <select name="judul" id="judul[]" class="form-last-name form-control">
                                          <option value="">Subjek</option>
                                          
                                        </select>
                                        <span class="selectRequiredMsg">Sila Pilih Subjek.</span></span></div>
                                        <div class="form-group"><span id="spryselect3">
				                        
				                        <button type="submit" name="submit" class="btn"><i class="fas fa-server"></i> Daftar Sekarang</button>
				                        
				                    </form>
				                    <?php require('selectOption.php');?>
			                    </div>
                        	</div>
                            </div>
                        </div>
                    </div>                   
                   
        </div>
        

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Hakcipta terpelihara SM</p>
        			</div>
        			
        		</div>
        	</div>
        </footer>
</div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        

    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
    </script>
    </body>

</html>
<?php
mysqli_free_result($daftarSubjekKSSM);
mysqli_free_result($daftarSubjekMPV);
mysqli_free_result($daftarSubjekSTAM);
mysqli_free_result($daftarAliran);
?>
