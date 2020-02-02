<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$khususDoktor = $_POST['khususDoktor'];
$institusiDoktor = $_POST['institusiDoktor'];
$tahunDoktor = $_POST['tahunDoktor'];
$khususSarjana = $_POST['khususSarjana'];
$institusiSarjana = $_POST['institusiSarjana'];
$tahunSarjana = $_POST['tahunSarjana'];
$khususSM = $_POST['khususSM'];
$institusiSM = $_POST['institusiSM'];
$tahunSM = $_POST['tahunSM'];
$khususDiploma = $_POST['khususDiploma'];
$institusiDiploma = $_POST['institusiDiploma'];
$tahunDiploma = $_POST['tahunDiploma'];
$khususIkhtisas= $_POST['khususIkhtisas'];
$institusiIkhtisas = $_POST['institusiIkhtisas'];
$tahunIkhtisas = $_POST['tahunIkhtisas'];
$noIC = $_POST['noIC'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataPendidikan SET khususDoktor='$khususDoktor', InstitusiDoktor='$institusiDoktor', tahunDoktor='$tahunDoktor', khususSarjana='$khususSarjana', institusiSarjana='$institusiSarjana', tahunSarjana='$tahunSarjana', khususSM='$khususSM', institusiSM='$institusiSM', tahunSM='$tahunSM', khususDiploma='$khususDiploma', institusiDIploma='$institusiDiploma', tahunDiploma='$tahunDiploma', khususIkhtisas='$khususIkhtisas', institusiIkhtisas='$institusiIkhtisas', tahunIkhtisas='$tahunIkhtisas' WHERE noIC='$noIC'");
  
  header("Location: rekodSumbangan.php");
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}

$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}

$Recordset2 = $mysqli->query("SELECT * FROM dataPendidikan WHERE noIC = '$colname_Recordset2'");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);


$daftarTahun = $mysqli->query("SELECT * FROM daftarTahun");
$row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
$totalRows_daftarTahun = mysqli_num_rows($daftarTahun);
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
        
        <style>
            #row{
            overflow: hidden;
            background-color: grey;
            color: white;
            display:block; 
            }
        
            .h1{
            float: center;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }
            
            
        </style>
<title>Rekod Akademik</title>
</head>
<body>
    <div class="container"> 
               <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[Kelulusan Akademik/Iktisas & Bidang Pengkhususan]</Strong>
                            	</p>
                            </div>
                        </div>
                   </div>
 
                  
<form action="<?php echo $editFormAction; ?>" method="POST" name="prosesAkademik">
<div class="row" id="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1 class="h1">Kedoktoran</h1>
</div>
</div>
<div class="form-group">
<label for="khusuDoktor" class="control-label"></label>
<input name="khususDoktor" class="form-control" id="khususDoktor" value="<?php echo $row_Recordset2['khususDoktor']; ?>" placeholder="Pengkhususan Phd"/>
</div>
<br/>
<div class="form-group">
<label for="institusiDoktor" class="control-label"></label>
<input name="institusiDoktor" class="form-control" value="<?php echo $row_Recordset2['InstitusiDoktor']; ?>" placeholder="Institusi Phd"/>
</div>
<br/>
<div class="form-group">
<label for="tahunDoktor" class="control-label"></label>
<select name="tahunDoktor" class="form-control">
  <option value="" <?php if (!(strcmp("", $row_Recordset2['tahunDoktor']))) {echo "selected=\"selected\"";} ?>>Pilih tahun Phd</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarTahun['tahun']?>"<?php if (!(strcmp($row_daftarTahun['tahun'], $row_Recordset2['tahunDoktor']))) {echo "selected=\"selected\"";} ?>><?php echo $row_daftarTahun['tahun']?></option>
  <?php
} while ($row_daftarTahun = mysqli_fetch_assoc($daftarTahun));
  $rows = mysqli_num_rows($daftarTahun);
  if($rows > 0) {
      mysqli_data_seek($daftarTahun, 0);
	  $row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
  }
?>
</select>
</div>
<br/>
<div class="row" id="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1 class="h1">Sarjana</h1>
</div>
</div>
<div class="form-group">
<label for="khusuSarjana" class="control-label"></label>
<input name="khususSarjana" class="form-control" id="khususSarjana" value="<?php echo $row_Recordset2['khususSarjana']; ?>" placeholder="Pengkhususan Sarjana"/>
</div>
<br/>
<div class="form-group">
<label for="institusiSarjana" class="control-label"></label>
<input name="institusiSarjana" class="form-control" value="<?php echo $row_Recordset2['institusiSarjana']; ?>" placeholder="Institusi Sarjana"/>
</div>
<br/>
<div class="form-group">
<label for="tahunSarjana" class="control-label"></label>
<select name="tahunSarjana" class="form-control">
  <option value="" <?php if (!(strcmp("", $row_Recordset2['tahunSarjana']))) {echo "selected=\"selected\"";} ?>>Pilih tahun sarjana</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarTahun['tahun']?>"<?php if (!(strcmp($row_daftarTahun['tahun'], $row_Recordset2['tahunSarjana']))) {echo "selected=\"selected\"";} ?>><?php echo $row_daftarTahun['tahun']?></option>
  <?php
} while ($row_daftarTahun = mysqli_fetch_assoc($daftarTahun));
  $rows = mysqli_num_rows($daftarTahun);
  if($rows > 0) {
      mysqli_data_seek($daftarTahun, 0);
	  $row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
  }
?>
</select>
</div>
<br/>
<div class="row" id="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1 class="h1">Sarjana Muda</h1>
</div>
</div>
<div class="form-group">
<label for="khususSM" class="control-label"></label>
<input name="khususSM" class="form-control" id="khususSM" value="<?php echo $row_Recordset2['khususSM']; ?>" placeholder="Pengkhususan Sarjana Muda"/>
</div>
<br/>
<div class="form-group">
<label for="institusiIkhtisas" class="control-label"></label>
<input name="institusiSM" class="form-control" value="<?php echo $row_Recordset2['institusiSM']; ?>" placeholder="Institusi Sarjana Muda"/>
</div>
<br/>
<div class="form-group">
<label for="tahunIkhtisas" class="control-label"></label>
<select name="tahunSM" class="form-control" >
  <option value="" <?php if (!(strcmp("", $row_Recordset2['tahunSM']))) {echo "selected=\"selected\"";} ?>>Pilih tahun Sarjana Muda</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarTahun['tahun']?>"<?php if (!(strcmp($row_daftarTahun['tahun'], $row_Recordset2['tahunSM']))) {echo "selected=\"selected\"";} ?>><?php echo $row_daftarTahun['tahun']?></option>
  <?php
} while ($row_daftarTahun = mysqli_fetch_assoc($daftarTahun));
  $rows = mysqli_num_rows($daftarTahun);
  if($rows > 0) {
      mysqli_data_seek($daftarTahun, 0);
	  $row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
  }
?>
</select>
</div>
<br/>
<div class="row" id="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1 class="h1">Diploma</h1>
</div>
</div>
<div class="form-group">
<label for="khusuDiploma" class="control-label"></label>
<input name="khususDiploma" class="form-control" id="khususDiploma" value="<?php echo $row_Recordset2['khususDiploma']; ?>" placeholder="Pengkhususan Diploma"/>
</div>
<br/>
<div class="form-group">
<label for="institusiDiploma" class="control-label"></label>
<input name="institusiDiploma" class="form-control" value="<?php echo $row_Recordset2['institusiDiploma']; ?>" placeholder="Institusi Diploma"/>
</div>
<br/>
<div class="form-group">
<label for="tahunDiploma" class="control-label"></label>
<select name="tahunDiploma" class="form-control" >
  <option value="" <?php if (!(strcmp("", $row_Recordset2['tahunDiploma']))) {echo "selected=\"selected\"";} ?>>Pilih tahun Diploma</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarTahun['tahun']?>"<?php if (!(strcmp($row_daftarTahun['tahun'], $row_Recordset2['tahunDiploma']))) {echo "selected=\"selected\"";} ?>><?php echo $row_daftarTahun['tahun']?></option>
  <?php
} while ($row_daftarTahun = mysqli_fetch_assoc($daftarTahun));
  $rows = mysqli_num_rows($daftarTahun);
  if($rows > 0) {
      mysqli_data_seek($daftarTahun, 0);
	  $row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
  }
?>
</select>
</div>
<br/>
<div class="row" id="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1 class="h1">Ikhtisas</h1>
</div>
</div>
<div class="form-group">
<label for="khusuIkhtisas" class="control-label"></label>
<input name="khususIkhtisas" class="form-control" id="khususIkhtisas" value="<?php echo $row_Recordset2['khususIkhtisas']; ?>"placeholder="Pengkhususan Ikhtisas" />
</div>
<br/>
<div class="form-group">
<label for="institusiIkhtisas" class="control-label"></label>
<input name="institusiIkhtisas" class="form-control" value="<?php echo $row_Recordset2['institusiIkhtisas']; ?>" placeholder="Institusi Ikhtisas"/>
</div>
<br/>
<div class="form-group">
<label for="tahunIkhtisas" class="control-label"></label>
<select name="tahunIkhtisas" class="form-control" >
  <option value="" <?php if (!(strcmp("", $row_Recordset2['tahunIkhtisas']))) {echo "selected=\"selected\"";} ?>>Pilih tahun Ikhtisas</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarTahun['tahun']?>"<?php if (!(strcmp($row_daftarTahun['tahun'], $row_Recordset2['tahunIkhtisas']))) {echo "selected=\"selected\"";} ?>><?php echo $row_daftarTahun['tahun']?></option>
  <?php
} while ($row_daftarTahun = mysqli_fetch_assoc($daftarTahun));
  $rows = mysqli_num_rows($daftarTahun);
  if($rows > 0) {
      mysqli_data_seek($daftarTahun, 0);
	  $row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
  }
?>
</select>
</div>
<br/>
<input name="noIC" type="hidden" value="<?php echo $row_Recordset1['noIC']; ?>" />
    <div class="form-group"> <!-- Submit Button -->
	    <button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
	</div>
    
</form>
</body>
</html>
