<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$mesyuarat=$_POST['mesyuarat'];
$tarikh=$_POST['tarikh'];
$tempat=$_POST['tempat'];
$tahun=$_POST['tahun'];
$nama=$_POST['nama'];
$noIC=$_POST['noIC'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataBengkel SET mesyuarat=%s, tarikh=%s, tempat=%s, tahun=%s, nama=%s WHERE noIC=%s");
  header('Location: rekodPejabat.php');
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

$Recordset2 = $mysqli->query("SELECT * FROM dataBengkel WHERE noIC = '$colname_Recordset2'");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$daftarSubjek = $mysqli->query("SELECT * FROM daftarSubjek");
$row_daftarSubjek = mysqli_fetch_assoc($daftarSubjek);
$totalRows_daftarSubjek = mysqli_num_rows($daftarSubjek);

$daftarAliran = $mysqli->query("SELECT * FROM daftarAliran");
$row_daftarAliran = mysqli_fetch_assoc($daftarAliran);
$totalRows_daftarAliran = mysqli_num_rows($daftarAliran);

$daftarTingkatan = $mysqli->query("SELECT * FROM daftarTingkatan");
$row_daftarTingkatan = mysqli_fetch_assoc($daftarTingkatan);
$totalRows_daftarTingkatan = mysqli_num_rows($daftarTingkatan);

$daftarBengkel = $mysqli->query("SELECT * FROM daftarBengkel");
$row_daftarBengkel = mysqli_fetch_assoc($daftarBengkel);
$totalRows_daftarBengkel = mysqli_num_rows($daftarBengkel);
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
<title>Rekod Bengkel</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <script>
  $( function() {
    $( "#tarikh" ).datepicker();
  } );
  </script>
  
</head>

<body>
<div class="container">
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <img src="images/uploads/<?php echo $row_Recordset2['gambar']; ?>" width="5%" height="5%"class="img-circle"/>
                            <div class="description">
                            	<p>
	                            	<Strong>[Rekod Mesyuarat]</Strong> <br/> Sila lengkapkan semua maklumat berikut:
                            	</p>
                            </div>
                        </div>
                    </div>

<form action="<?php echo $editFormAction; ?>" name="simpan" method="POST">
<br />
<div class="form-group"> <!-- Zip Code-->
		<label for="nama" class="control-label">Nama:</label>
		<input name="nama"  id="nama" value="<?php echo $row_Recordset2['nama']; ?>" placeholder="Nama" class="form-control"/>
		</div>	
</br>
<div class="form-group">
<label for="mesyuarat" class="control-label">Mesyuarat/Kursus/Bengkel:</label>
<span id="spryselect1">
<select name="mesyuarat" id="mesyuarat" class="form-control">
  <option value=""  <?php if (!(strcmp("", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Pilih...</option>
  <option value="Bengkel Kerja Penyediaan Penilai" <?php if (!(strcmp("Bengkel Kerja Penyediaan Penilai", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Bengkel Kerja Penyediaan Penilai</option>
  <option value="Bengkel Kerja Penambahbaikan PMS" <?php if (!(strcmp("Bengkel Kerja Penambahbaikan PMS", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Bengkel Kerja Penambahbaikan PMS</option>
  <option value="Bengkel Kerja Penyemakan NSK" <?php if (!(strcmp("Bengkel Kerja Penyemakan NSK", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Bengkel Kerja Penyemakan NSK</option>
  <option value="Bengkel Kerja Penyemakan Pembetulan PMS" <?php if (!(strcmp("Bengkel Kerja Penyemakan Pembetulan PMS", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Bengkel Kerja Penyemakan Pembetulan PMS</option>
  <option value="Bengkel Kerja Penyemakan Naskah Contoh" <?php if (!(strcmp("Bengkel Kerja Penyemakan Naskah Contoh", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Bengkel Kerja Penyemakan NC</option>
  <option value="Bengkel Kerja Pembangunan Modul BPK" <?php if (!(strcmp("Bengkel Kerja Pembangunan Modul BPK", $row_Recordset2['mesyuarat']))) {echo "selected=\"selected\"";} ?>>Bengkel Kerja Pembangunan Modul BPK</option>
 
</select>
<br />

    <div class="form-group"> <!-- Zip Code-->
		<label for="tarikh" class="control-label">Tarikh:</label>
		<span id="sprytextfield1">
		<input name="tarikh"  id="tarikh" value="<?php echo $row_Recordset2['tarikh']; ?>" placeholder="Klik Tarikh" class="form-control" readonly="readonly"/>
		<span class="textfieldRequiredMsg">Sila Pilih Tarikh Bengkel/Kursus.</span></span></div> 	
<br />
<div class="form-group">
<label for="tempat" class="control-label">Tempat:</label>
<span id="spryselect5">
<select name="tempat" id="tempat" class="form-control">
  <option value="" <?php if (!(strcmp("", strtoupper($row_Recordset2['tempat'])))) {echo "selected=\"selected\"";} ?>>Pilih tempat</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarBengkel['tempat']?>"<?php if (!(strcmp($row_daftarBengkel['tempat'], $row_Recordset2['tempat']))) {echo "selected=\"selected\"";} ?>><?php echo $row_daftarBengkel['tempat']?></option>
  <?php
} while ($row_daftarBengkel = mysqli_fetch_assoc($daftarBengkel));
  $rows = mysqli_num_rows($daftarBengkel);
  if($rows > 0) {
      mysqli_data_seek($daftarBengkel, 0);
	  $row_daftarBengkel = mysqli_fetch_assoc($daftarBengkel);
  }
?>
</select>
<span class="selectRequiredMsg">Sila pilih tempat.</span></span></div>
<br />
<input type="hidden" name="nama" value="<?php echo ucwords($row_Recordset1['nama']); ?>" />
<input type="hidden" name="noIC" value="<?php echo $row_Recordset1['noIC']; ?>" />
<input type="hidden" name="tahun" value="<?php echo date("Y"); ?>"/>
<br />
    <div class="form-group"> <!-- Submit Button -->
		<button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
	</div>
</form>
</div>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
</script>
</body>
</html>