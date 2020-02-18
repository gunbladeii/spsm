<?php require('Connections/ePenilai.php'); ?>
<?php session_start();?>
<?php
$noIC=$_POST['noIC'];
$nama=$_POST['nama'];
$jantina=$_POST['jantina'];
$mesyuarat=$_POST['mesyuarat'];
$aliran=$_POST['aliran'];
$judul=$_POST['judul'];
$tarikh=$_POST['tarikh'];
$tahun=$_POST['tahun'];
$tempat=$_POST['tempat'];

if (isset($_POST["submit"])){
  $mysqli->query("INSERT INTO dataBengkel (noIC, nama, jantina, mesyuarat, aliran, judul, tarikh, tahun, tempat) VALUES ('$noIC', '$nama', '$jantina', '$mesyuarat', '$aliran', '$judul', '$tarikh', '$tahun', '$tempat')");
  header("Location: main_menu.php?");
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
  
  <style>
#overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.8);
    z-index: 2;
    cursor: pointer;
}

#text{
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 32px;
    color: white;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}
</style>
<script>
function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}
</script>

</head>

<body onload="on()">
<div class="container">
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <img src="images/uploads/<?php echo $row_Recordset2['gambar']; ?>" width="5%" height="5%"class="img-circle"/>
                            <div class="description">
                            	<p>
	                            	<Strong>Kemaskini Maklumat Bengkel Semasa </Strong> <br/> Sila lengkapkan semua maklumat berikut:
                            	</p>
                            </div>
                        </div>
                    </div>
                    
<div id="overlay" onclick="off()">
  <div id="text">
  <p>Anda pasti berada dalam ruangan yang betul? Ruangan ini KHAS untuk mendaftar maklumat berkaitan <strong>mesyuarat/bengkel</strong> yang BAHARU dihadiri anda.Jika ingin mengemaskini maklumat diri. Sila klik <a href="main_menu.php">SINI</a></p>
  <p style="font-size:18px">(Sentuh mana-mana bahagian di skrin jika ingin meneruskan pendaftaran mesyuarat/bengkel baharu)</p>
  </div>
</div>

<div class="form-bottom">
<form action="<?php echo $editFormAction; ?>" name="prosesDaftar" method="POST" class="login-form">
<div class="form-group">
<label class="sr-only" for="form-username">Mesyuarat/Kursus/Bengkel:</label>
<span id="spryselect1">
<select name="mesyuarat" id="mesyuarat" class="form-control">
  <option value="" >Bengkel:</option>
  <option value="Bengkel Kerja Penyediaan Penilai">Bengkel Kerja Penyediaan Penilai</option>
  <option value="Bengkel Kerja Penambahbaikan PMS">Bengkel Kerja Penambahbaikan PMS</option>
  <option value="Bengkel Kerja Penyemakan NSK">Bengkel Kerja Penyemakan NSK</option>
  <option value="Bengkel Kerja Penyemakan Pembetulan PMS">Bengkel Kerja Penyemakan Pembetulan PMS</option>
  <option value="Bengkel Kerja Penyemakan Naskah Contoh">Bengkel Kerja Penyemakan NC</option>
  <option value="Bengkel Kerja Tambahan (NSK)">Bengkel Kerja Tambahan (NSK)</option>
  <option value="Bengkel Kerja Pembangunan Modul BPK">Bengkel Kerja Pembangunan Modul BPK</option>
</select>
<span class="selectRequiredMsg">Silih pilih maklumat bengkel.</span></span></div>
<br />
  <div class="form-group">
  <label class="sr-only" for="form-username">Aliran:</label>
  <span id="spryselect2">
  <select name="aliran" id="aliran" class="form-control">
    <option value="" >Aliran:</option>
    <?php
do {  
?>
    <option value="<?php echo $row_daftarAliran['aliran']?>"><?php echo $row_daftarAliran['aliran']?></option>
    <?php
} while ($row_daftarAliran = mysqli_fetch_assoc($daftarAliran));
  $rows = mysqli_num_rows($daftarAliran);
  if($rows > 0) {
      mysqli_data_seek($daftarAliran, 0);
	  $row_daftarAliran = mysqli_fetch_assoc($daftarAliran);
  }
?>
  </select>
  <span class="selectRequiredMsg">Sila Pilih Aliran</span></span></div>
<br />
<div class="form-group">
  <label class="sr-only" for="form-username">Judul:</label>
  <span id="spryselect3">
  <select name="judul" id="judul[]" class="form-last-name form-control">
       <option value="">Subjek</option>
  </select>
  <span class="selectRequiredMsg">Sila Pilih Judul.</span></span></div>
  <br />
    <div class="form-group"> <!-- Zip Code-->
		<label class="sr-only" for="form-username">Tarikh:</label>
		<span id="sprytextfield1">
		<input name="tarikh"  id="tarikh" placeholder="Tarikh:" class="form-control" readonly="readonly"/>
		<span class="textfieldRequiredMsg">Sila Pilih Tarikh Bengkel/Kursus.</span></span></div>	
<br />
<div class="form-group">
<label class="sr-only" for="form-username">Tempat:</label>
<span id="spryselect5">
<select name="tempat" id="tempat" class="form-control">
  <option value="">Tempat:</option>
  <?php
do {  
?>
  <option value="<?php echo $row_daftarBengkel['tempat']?>"><?php echo $row_daftarBengkel['tempat']?></option>
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
<input type="hidden" name="jantina" value="<?php echo ucwords($row_Recordset1['jantina']); ?>" />
<input type="hidden" name="nama" value="<?php echo ucwords($row_Recordset1['nama']); ?>" />
<input type="hidden" name="noIC" value="<?php echo $row_Recordset1['noIC']; ?>" />
<input type="hidden" name="tahun" value="<?php echo date("Y"); ?>"/>
<br />
    <div class="form-group"> <!-- Submit Button -->
		<button type="button" class="btn btn-info" onclick="history.back()">Kembali</button>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn">Simpan dan Seterusnya</button>
    </div>
    
</form>
<?php require('selectOption.php');?>
</div>
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
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($daftarSubjek);

mysqli_free_result($daftarAliran);

mysqli_free_result($daftarTingkatan);

mysqli_free_result($daftarBengkel);
?>
