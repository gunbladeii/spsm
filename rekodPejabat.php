<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$alamatKerja = $_POST['alamatKerja'];
$poskod = $_POST['poskod'];
$negeri = $_POST['negeri'];
$telefonPejabat = $_POST['telefonPejabat'];
$faksPejabat = $_POST['faksPejabat'];
$telefonBimbit = $_POST['telefonBimbit'];
$emel = $_POST['emel'];
$jawatan = $_POST['jawatan'];
$gredJawatan = $_POST['gredJawatan'];
$noIC = $_POST['noIC'];
$nama = $_POST['nama'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataPerkhidmatan SET alamatKerja='$alamatKerja', poskod='$poskod', negeri='$negeri', telefonPejabat='$telefonPejabat', faksPejabat='$faksPejabat', telefonBimbit='$telefonBimbit', emel='$emel', jawatan='$jawatan', gredJawatan='$gredJawatan' WHERE noIC='$noIC'");
  
  header("Location: rekodKecemasan.php");
}

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE login SET nama='$nama' WHERE noIC='$noIC'");

  header("Location: rekodKecemasan.php");
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

$Recordset2 = $mysqli->query("SELECT * FROM dataPerkhidmatan WHERE noIC = '$colname_Recordset2'");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

?>
<?php

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
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
        <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
        <title>Rekod Perkhidmatan</title>
        

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>

<body>
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[Rekod Perkhidmatan]</Strong> <br/> Sila lengkapkan semua maklumat berikut:
                            	</p>
                            </div>
                        </div>
                    </div>
<form action="<?php echo $editFormAction; ?>" method="POST" name="updatePerkhidmatan">
<div class="form-group"> <!-- Zip Code-->
		<label for="nama" class="control-label">Nama:</label>
		<input name="nama"  id="nama" value="<?php echo $row_Recordset1['nama']; ?>" placeholder="Nama" class="form-control"/>
</div>

<div class="form-group">
<label for="alamatKerja" class="control-label">Alamat Tempat Bertugas:</label>
<span id="sprytextfield1">
<input name="alamatKerja"  value="<?php echo strtoupper($row_Recordset2['alamatKerja']); ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila masukkan Alamat bertugas.</span></span></div>
<br/>
<div class="form-group">
<label for="poskod" class="control-label">Poskod:</label>
<span id="sprytextfield2">
<input name="poskod"  value="<?php echo $row_Recordset2['poskod']; ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila masukkan Poskod.</span></span></div>
<br/>
<div class="form-group">
<label for="negeri" class="control-label">Negeri:</label>
<span id="spryselect1">
<select name="negeri" class="form-control"?>
  <option value=""  <?php if (!(strcmp("", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Pilih Negeri</option>
  <option value="sabah" <?php if (!(strcmp("sabah", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Sabah</option>
  <option value="Sarawak" <?php if (!(strcmp("Sarawak", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Sarawak</option>
  <option value="Johor" <?php if (!(strcmp("Johor", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Johor</option>
  <option value="Melaka" <?php if (!(strcmp("Melaka", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Melaka</option>
  <option value="Negeri Sembilan" <?php if (!(strcmp("Negeri Sembilan", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Negeri Sembilan</option>
  <option value="W.P Kuala Lumpur" <?php if (!(strcmp("W.P Kuala Lumpur", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>W.P Kuala Lumpur</option>
  <option value="Selangor" <?php if (!(strcmp("Selangor", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Selangor</option>
  <option value="W.P Putrajaya" <?php if (!(strcmp("W.P Putrajaya", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>W.P Putrajaya</option>
  <option value="W.P Labuan" <?php if (!(strcmp("W.P Labuan", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>W.P Labuan</option>
  <option value="Perak" <?php if (!(strcmp("Perak", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Perak</option>
  <option value="Pulau Pinang" <?php if (!(strcmp("Pulau Pinang", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Pulau Pinang</option>
  <option value="Kedah" <?php if (!(strcmp("Kedah", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Kedah</option>
  <option value="Perlis" <?php if (!(strcmp("Perlis", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Perlis</option>
  <option value="Kelantan" <?php if (!(strcmp("Kelantan", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Kelantan</option>
  <option value="Terengganu" <?php if (!(strcmp("Terengganu", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Terengganu</option>
  <option value="Pahang" <?php if (!(strcmp("Pahang", $row_Recordset2['negeri']))) {echo "selected=\"selected\"";} ?>>Pahang</option>
</select>
<span class="selectRequiredMsg">*Wajib - Sila Pilih Negeri.</span></span></div>
<br/>
<div class="form-group">
<label for="telefonPejabat" class="control-label">Telefon Pejabat:</label>
<span id="sprytextfield3">
<input name="telefonPejabat"  value="<?php echo $row_Recordset2['telefonPejabat']; ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila masukkan No. Telefon.</span><span class="textfieldInvalidFormatMsg">Mesti dalam bentuk Nombor.</span></span></div>
<br/>
<div class="form-group">
<label for="faksPejabat" class="control-label">Faks Pejabat:</label>
<span id="sprytextfield4">
<input name="faksPejabat"  value="<?php echo $row_Recordset2['faksPejabat']; ?>" class="form-control" />
<span class="textfieldRequiredMsg">*Wajib - Sili Masukkan Faks Pejabat.</span><span class="textfieldInvalidFormatMsg">Mesti dalam bentuk Nombor Faks.</span></span></div>
<br/>
<div class="form-group">
<label for="telefonBimbit" class="control-label">Telefon Bimbit:</label>
<span id="sprytextfield5">
<input name="telefonBimbit"  value="<?php echo $row_Recordset2['telefonBimbit']; ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila isi No. Telefon Bimbit.</span><span class="textfieldInvalidFormatMsg">Mesti dalam bentuk Nombor Telefon.</span></span></div>
<br/>
<div class="form-group">
<label for="alamatKerja" class="control-label">E-mel:</label>
<span id="sprytextfield6">
<input name="emel"  value="<?php echo $row_Recordset2['emel']; ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila isi maklumat e-mel.</span><span class="textfieldInvalidFormatMsg">Format e-mel salah.</span></span></div>
<br/>
<div class="form-group">
<label for="jawatan" class="control-label">Jawatan:</label>
<span id="spryselect2">
<select name="jawatan" class="form-control">
  <option value="" <?php if (!(strcmp("", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Pilih Jawatan</option>
  <option value="Profesor" <?php if (!(strcmp("Profesor", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Profesor</option>
  <option value="Profesor Madya" <?php if (!(strcmp("Profesor Madya", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Profesor Madya</option>
  <option value="Pensyarah Kanan" <?php if (!(strcmp("Pensyarah Kanan", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Pensyarah Kanan</option>
  <option value="Pensyarah" <?php if (!(strcmp("Pensyarah", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Pensyarah</option>
  <option value="Guru Penolong Kanan" <?php if (!(strcmp("Guru Penolong Kanan", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Guru Penolong Kanan</option>
  <option value="Guru Bidang" <?php if (!(strcmp("Guru Bidang", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Guru Bidang</option>
<option value="SISC+" <?php if (!(strcmp("SISC+", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>SISC+</option>
  <option value="SIP+" <?php if (!(strcmp("SIP+", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>SIP+</option>
  <option value="Guru Akademik Biasa" <?php if (!(strcmp("Guru Akademik Biasa", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Guru Akademik Biasa</option>
  <option value="Guru Cemerlang" <?php if (!(strcmp("Guru Cemerlang", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Guru Cemerlang</option>
  <option value="Ketua Penolong Pengarah" <?php if (!(strcmp("Ketua Penolong Pengarah", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Ketua Penolong Pengarah</option>
  <option value="Penolong Pengarah" <?php if (!(strcmp("Penolong Pengarah", $row_Recordset2['jawatan']))) {echo "selected=\"selected\"";} ?>>Penolong Pengarah</option>
</select>
<span class="selectRequiredMsg">*Wajib - Sili pilih jawatan anda.</span></span></div>
<br/>
<div class="form-group">
<label for="gredJawatan" class="control-label">Gred Jawatan:</label>
<span id="spryselect3">
<select name="gredJawatan" class="form-control">
  <option value="">Pilih Gred</option>
  <option value="DG/DH/DM/DS41" <?php if (!(strcmp("DG/DH/DM/DS41", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>DG/DH/DM/DS41</option>
  <option value="DG/DH/DM/DS44" <?php if (!(strcmp("DG/DH/DM/DS44", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>DG/DH/DM/DS44</option>
  <option value="DG/DH/DM/DS45" <?php if (!(strcmp("DG/DH/DM/DS45", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>DG/DH/DM/DS45</option>
  <option value="DG/DH/DM/DS48" <?php if (!(strcmp("DG/DH/DM/DS48", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>DG/DH/DM/DS48</option>
  <option value="DG/DH/DM/DS52" <?php if (!(strcmp("DG/DH/DM/DS52", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>DG/DH/DM/DS52</option>
  <option value="DG/DH/DM/DS54" <?php if (!(strcmp("DG/DH/DM/DS54", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>DG/DH/DM/DS54</option>
  <option value="GRED KHAS C" <?php if (!(strcmp("GRED KHAS C", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>GRED KHAS C</option>
  <option value="GRED KHAS B" <?php if (!(strcmp("GRED KHAS B", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>GRED KHAS B</option>
  <option value="VK5" <?php if (!(strcmp("VK5", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>VK5</option>
  <option value="VK7" <?php if (!(strcmp("VK7", $row_Recordset2['gredJawatan']))) {echo "selected=\"selected\"";} ?>>VK7</option>
</select>
<span class="selectRequiredMsg">*Wajib - Sila Pilih Gread anda.</span></span></div>
<input type="hidden" name="noIC" value="<?php echo $row_Recordset1['noIC']; ?>" />
<br/>
<div class="form-group"> <!-- Submit Button -->
		<button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
	</div>
<input type="hidden" name="MM_update" value="updatePerkhidmatan" />
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "email");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
</script>
</body>
</html>